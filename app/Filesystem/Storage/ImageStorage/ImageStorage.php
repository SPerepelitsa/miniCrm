<?php

namespace App\Filesystem\Storage\ImageStorage;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile as UploadedFile;

class ImageStorage
{
    private $storage;

    public function __construct(string $storageName)
    {
        $this->storage = Storage::disk($storageName);
    }

    private function createImageFileName(UploadedFile $image) :string
    {
        return md5(uniqid(random_int(1, 999), true)) . '.' . $image->getClientOriginalExtension();
    }

    public function saveImage(UploadedFile $image)
    {
        $filename = $this->createImageFileName($image);
        $save = $this->storage->put($filename, file_get_contents($image));

        // $save returns bool
        return $save ? $filename: null;
    }

    private function imageExists(string $imageFilename) :bool
    {
        return $this->storage->exists($imageFilename);
    }

    public function deleteImage(string $imageFilename): bool
    {
        if (!$this->imageExists($imageFilename)) {

            return false;
        }

        return $this->storage->delete($imageFilename);
    }
}
