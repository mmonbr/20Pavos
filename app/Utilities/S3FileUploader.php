<?php namespace App\Utilities;

use Illuminate\Filesystem\FilesystemManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class S3FileUploader
{
    protected $file;
    protected $uploadedFileName;
    protected $fileSystemManager;
    protected $uploadsPath = 'uploads/products';

    public function __construct(FilesystemManager $fileSystemManager)
    {
        $this->fileSystemManager = $fileSystemManager;
    }

    public function file(UploadedFile $file)
    {
        $this->file = $file;

        return $this;
    }

    public function upload()
    {
        $this->composeFileName();

        $this->fileSystemManager->disk('s3')->put($this->getPath(), file_get_contents($this->file), 'public');

        return $this;
    }

    public function getPath()
    {
        return "{$this->uploadsPath}/{$this->uploadedFileName}";
    }

    public function setUploadsPath($path)
    {
        $this->uploadsPath = $path;

        return $this;
    }

    private function composeFileName()
    {
        $this->uploadedFileName = str_random(16) . '.' . $this->file->getClientOriginalExtension();
    }
}