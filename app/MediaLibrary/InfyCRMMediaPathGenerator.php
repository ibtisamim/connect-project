<?php

namespace App\MediaLibrary;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\DefaultPathGenerator;

class InfyCRMMediaPathGenerator extends DefaultPathGenerator
{
    /*
     * Get a unique base path for the given media.
     */
    protected function getBasePath(Media $media): string
    {
     //   $currentTenant = app('currentTenant');

    //    return $currentTenant->unique_id.DIRECTORY_SEPARATOR.$media->getKey();

        $rv = $media->getKey();

        if ($media->model_type == 'App\Models\User') {
            $collection = $media->collection_name;
            if($media->hasCustomProperty('job_id')){
                $rv = 'User/'. $collection . '/job/'.$media->getCustomProperty('job_id').'/'. $media->getKey();
            }
        }

        if ($media->model_type == 'App\Models\RequestProject') {
            $collection = $media->collection_name;
            if($media->hasCustomProperty('gallery')){
                $rv = 'User/RequestProject/'. $collection . '/'.$media->getCustomProperty('gallery').'/'. $media->getKey();
            }
        }

        return $rv;


    }
}