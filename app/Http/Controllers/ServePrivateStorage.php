<?php

namespace App\Http\Controllers;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ServePrivateStorage extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Spatie\MediaLibrary\MediaCollections\Models\Media $media
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Media $media)
    {
        // $this->authorize('view', $media->model);

        return $media;
    }
}
