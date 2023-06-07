<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class FilesService
{
    private $imagesDirServer;

    public function __construct()
    {
        $this->setimagesDirServer();
    }
    public function createPhotoFromBase64(string $b64hash): string|false
    {
        $uid = uniqid("", true) . ".png";
        $pathPhoto = $this->imagesDirServer . $uid;
        if (file_put_contents($pathPhoto, base64_decode($b64hash))) {
            return $uid;
        }
        return false;
    }
    public function getImagesDir()
    {
        return 'images/';
    }
    private function setimagesDirServer()
    {
        $this->imagesDirServer = storage_path("app/public/") . 'images/';
        File::isDirectory($this->imagesDirServer) or File::makeDirectory($this->imagesDirServer);
    }
}
