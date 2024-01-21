<?php

namespace App\Services\ImageLoader;

use App\Services\ImageLoader\Interfaces\IImageLoader;
use OldRavian\FileUploader\Factories\FileUploaderFactory;

class ImageBase64Loader implements IImageLoader
{

    public function __construct(
        private readonly FileUploaderFactory $uploader_factory
    ){}

    public function load(string $image_base64, string $path_prefix): string
    {
        $options = [
            'directory' => $path_prefix,
            'disk' => 'local',
            'allowedExtensions' => $this->getMimeTypeImage($image_base64)
        ];

        $uploader = $this->uploader_factory->build('base64');
        $data = $uploader->upload($image_base64, $options);

        return $data['path'] ?? '';
    }

    private function getMimeTypeImage(string $base_64): string
    {
        $result_array = preg_split(
            '/data:image\/|;base64/',
            $base_64
        );

        return $result_array[1] ?? '';
    }
}
