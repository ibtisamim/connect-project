<?php

namespace App\Http\Controllers;

use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\DefaultPathGenerator;
use App\Models\User;

class CustomPathGenerator implements DefaultPathGenerator
{
    public function getPath(Media $media) : string
    {
        if ($media instanceof User) {
            return 'user/'.$media->model_id.'/' . $media->id;
        }
        return md5($media->id).'/';
    }

    public function getPathForConversions(Media $media) : string
    {
        return $this->getPath($media).'c/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media).'/cri/';
    }
}