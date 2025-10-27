<?php

namespace App\Http\Controllers;

use App\Models\MediaResources;
use Illuminate\Http\Request;

class MediaResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store or update a media resource by slug + path.
     */
    public function storeOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'required|string|max:150',
            'title' => 'nullable|string|max:255',
            'media_id' => 'required|integer|exists:media,id',
            'path' => 'required|string',
            'alt_text' => 'nullable|string|max:255',
            'caption' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:100',
        ]);

        // Either update existing or create new record
        $resource = MediaResources::updateOrCreate(
            ['slug' => $validated['slug'], 'path' => $validated['path']],
            $validated
        );

        return response()->json([
            'success' => true,
            'message' => 'Resource updated successfully',
            'data' => $resource,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(MediaResources $mediaResources)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MediaResources $mediaResources)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MediaResources $mediaResources)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MediaResources $mediaResources)
    {
        //
    }
}
