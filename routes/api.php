<?php

use App\Http\Controllers\MediaResourcesController;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



use Illuminate\Support\Facades\Storage;
use App\Models\Page;

// Fetch all media for a page
Route::get('/pages/{slug}/media', function($slug) {
    $page = Page::where('slug', $slug)->firstOrFail();

    $media = $page->media()->get()->map(fn($m) => [
        'id' => $m->id,
        'original_name' => $m->original_name,
        'url' => Storage::disk($m->disk)->url($m->path),
        'role' => $m->pivot->role,
    ]);

    return $media->groupBy('role')->map(fn($group) => $group->values());
});

Route::post('/pages/{slug}/media', function (Request $request, $slug) {
    $validated = $request->validate([
        'media_ids' => 'required|array|min:1',
        'media_ids.*' => 'exists:media,id',
        'role' => 'required|string'
    ]);

    $page = Page::where('slug', $slug)->firstOrFail();

    // Prepare pivot data
    $syncData = collect($validated['media_ids'])->mapWithKeys(function ($id) use ($validated) {
        return [$id => ['role' => $validated['role']]];
    })->toArray();

    // Attach or update existing ones
    $page->media()->syncWithoutDetaching($syncData);

    return response()->json([
        'success' => true,
        'message' => 'Media attached successfully.',
    ]);
});


Route::post('/resources', [MediaResourcesController::class, 'storeOrUpdate']);