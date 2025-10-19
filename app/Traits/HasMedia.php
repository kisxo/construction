<?php

namespace App\Traits;

use App\Models\Media;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasMedia
{
    /**
     * Define polymorphic many-to-many relationship
     */
    public function media(): MorphToMany
    {
        return $this->morphToMany(Media::class, 'mediable')->withPivot('role')->withTimestamps();
    }

    /**
     * Attach a media item
     */
    public function attachMedia(Media $media, ?string $role = null): void
    {
        $this->media()->attach($media->id, ['role' => $role]);
    }

    /**
     * Detach a media item
     */
    public function detachMedia(Media $media): void
    {
        $this->media()->detach($media->id);
    }

    /**
     * Replace (sync) media items for a role
     */
    public function syncMedia(array $mediaIds, ?string $role = null): void
    {
        $syncData = [];
        foreach ($mediaIds as $id) {
            $syncData[$id] = ['role' => $role];
        }
        $this->media()->sync($syncData);
    }

    /**
     * Retrieve all media for a specific role
     */
    public function getMediaByRole(string $role)
    {
        return $this->media()->wherePivot('role', $role)->get();
    }

    /**
     * Get a featured image (shortcut)
     */
    public function featuredImage()
    {
        return $this->getMediaByRole('featured')->first();
    }
}
