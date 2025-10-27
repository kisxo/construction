<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use League\Flysystem\FilesystemException;


class MediaController extends Controller
{
    /**
     * List all media
     */
    public function 
    index(Request $request)
    {
        $query = Media::query();

        if ($folderId = $request->get('folder_id')) {
            $query->where('folder_id', $folderId);
        }

        if ($search = $request->get('q')) {
            $query->where('filename', 'like', "%{$search}%");
        }

        return response()->json($query->latest()->paginate(40));
    }

    /**
     * Upload media
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:102400', // 100MB
        ]);

        $file = $request->file('file');
        $disk = 's3';
        $uuid = Str::uuid()->toString();
        $dir = 'uploads/' . date('Y/m/d'); // just the folder
        $filename = $uuid . '.' . $file->getClientOriginalExtension();
        $path = $dir . '/' . $filename;

        // Store the file
        Storage::disk($disk)->putFileAs($dir, $file, $filename);

        // Get image metadata
        $width = $height = null;
        if (str_starts_with($file->getMimeType(), 'image/')) {
            [$width, $height] = getimagesize($file->getRealPath());
        }

        $media = Media::create([
            'uuid' => $uuid,
            'original_name' => $file->getClientOriginalName(),
            'filename' => $filename,
            'path' => $path,
            'disk' => $disk,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'width' => $width,
            'height' => $height,
            // 'variants' => $this->generateThumbnails($file, $path, $disk),
        ]);

        return response()->json($media, 201);
    }

    /**
     * Generate thumbnails for images
     */
    // protected function generateThumbnails($file, $path, $disk)
    // {
    //     $manager = new ImageManager(new Driver());
    //     if (!str_starts_with($file->getMimeType(), 'image/')) {
    //         return null;
    //     }

    //     $sizes = [
    //         'small' => 150,
    //         'medium' => 600,
    //         'large' => 1200,
    //     ];

    //     $variants = [];
    //     foreach ($sizes as $name => $width) {
    //         $img = $manager->read($file)->scaleDown(width: $width);

    //         $thumbPath = Str::replaceLast('.', "-{$name}.", $path);
    //         Storage::disk($disk)->put($thumbPath, (string) $img->encode());
    //         $variants[$name] = $thumbPath;
    //     }

    //     return $variants;
    // }

    /**
     * Show single media
     */
    public function show(Media $media)
    {
        return response()->json($media);
    }

    /**
     * Delete media
     */
    public function destroy(Media $media)
    {
        Storage::disk($media->disk)->delete($media->path);
        if ($media->variants) {
            foreach ($media->variants as $v) {
                Storage::disk($media->disk)->delete($v);
            }
        }
        $media->delete();

        return response()->json(['message' => 'Deleted']);
    }

    // Attach media to any model
    public function attachMedia(Request $request)
    {
        $request->validate([
            'media_uuid' => 'required|exists:media,uuid',
            'model_type' => 'required|string',
            'model_id' => 'required|integer',
            'tag' => 'nullable|string',
        ]);

        $media = Media::where('uuid', $request->media_uuid)->firstOrFail();
        $modelClass = $request->model_type;
        $model = $modelClass::findOrFail($request->model_id);

        $model->media()->syncWithoutDetaching([$media->id => ['tag' => $request->tag]]);

        return response()->json(['message' => 'Media attached successfully']);
    }

    // Detach media
    public function detachMedia(Request $request)
    {
        $request->validate([
            'media_uuid' => 'required|exists:media,uuid',
            'model_type' => 'required|string',
            'model_id' => 'required|integer',
        ]);

        $media = Media::where('uuid', $request->media_uuid)->firstOrFail();
        $modelClass = $request->model_type;
        $model = $modelClass::findOrFail($request->model_id);

        $model->media()->detach($media->id);

        return response()->json(['message' => 'Media detached successfully']);
    }

    // Fetch media for a specific model + tag
    public function mediaFor(Request $request)
    {
        $request->validate([
            'model_type' => 'required|string',
            'model_id' => 'required|integer',
            'tag' => 'nullable|string',
        ]);

        $modelClass = $request->model_type;
        $model = $modelClass::findOrFail($request->model_id);

        $media = $request->tag ? $model->mediaByTag($request->tag) : $model->media()->get();

        return response()->json($media);
    }
}
