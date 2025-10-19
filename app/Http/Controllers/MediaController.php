<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\MediaFolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class MediaController extends Controller
{
    /**
     * List all media
     */
    public function index(Request $request)
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
            'folder_id' => 'nullable|exists:media_folders,id',
        ]);

        $file = $request->file('file');
        $disk = 's3';
        $uuid = Str::uuid()->toString();
        $path = 'uploads/' . date('Y/m/d') . '/' . $uuid . '.' . $file->getClientOriginalExtension();
        $filename = $uuid . '.' . $file->getClientOriginalExtension();

        // Store the file
        // Storage::disk($disk)->put($path, file_get_contents($file));
        Storage::disk($disk)->putFileAs($path, $file, $filename);
        // $file->storeAs($path, $filename, 's3');

        // Get image metadata
        $width = $height = null;
        if (str_starts_with($file->getMimeType(), 'image/')) {
            [$width, $height] = getimagesize($file->getRealPath());
        }

        $media = Media::create([
            'uuid' => $uuid,
            'original_name' => $file->getClientOriginalName(),
            'filename' => $uuid . '.' . $file->getClientOriginalExtension(),
            'path' => $path,
            'disk' => $disk,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'width' => $width,
            'height' => $height,
            'folder_id' => $request->input('folder_id'),
            'variants' => $this->generateThumbnails($file, $path, $disk),
        ]);

        return response()->json($media, 201);
    }

    /**
     * Generate thumbnails for images
     */
    protected function generateThumbnails($file, $path, $disk)
    {
        $manager = new ImageManager(new Driver());
        if (!str_starts_with($file->getMimeType(), 'image/')) {
            return null;
        }

        $sizes = [
            'small' => 150,
            'medium' => 600,
            'large' => 1200,
        ];

        $variants = [];
        foreach ($sizes as $name => $width) {
            $img = $manager->read($file)->scaleDown(width: $width);

            $thumbPath = Str::replaceLast('.', "-{$name}.", $path);
            Storage::disk($disk)->put($thumbPath, (string) $img->encode());
            $variants[$name] = $thumbPath;
        }

        return $variants;
    }

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
}
