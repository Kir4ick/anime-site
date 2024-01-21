<?php

namespace App\Services\ImageLoader\Interfaces;

interface IImageLoader
{
    public function load(string $image_base64, string $path_prefix): string;
}
