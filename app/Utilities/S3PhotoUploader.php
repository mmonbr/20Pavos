<?php namespace App\Utilities;

use Illuminate\Filesystem\FilesystemManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class S3PhotoUploader
{
    protected $file;
    protected $fileSystemManager;
    protected $uploadsPath = 'uploads/products/';

    public function __construct(FilesystemManager $fileSystemManager)
    {
        $this->fileSystemManager = $fileSystemManager;
    }

    public function file(UploadedFile $file)
    {
        $this->file = $file;

        return $this;
    }

    public function getPath()
    {
        return $this->uploadsPath . $this->generateRandomString() . '.' . $this->file->getClientOriginalExtension();
    }

    public function upload()
    {
        $this->fileSystemManager->disk('s3')->put($this->getPath($this->file), file_get_contents($this->file), 'public');

        return $this;
    }

    private function generateRandomString()
    {
        return str_random(16);
    }
}