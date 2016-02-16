<?php

namespace App\Utilities;

use Carbon\Carbon;
use GrahamCampbell\Flysystem\FlysystemManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class S3FileUpload
{
    protected $file;
    protected $uploadedFileName;
    protected $flysystem;
    protected $uploadsPath = 'uploads/products';

    public function __construct(FlysystemManager $flysystem)
    {
        $this->flysystem = $flysystem;
    }

    public function file(UploadedFile $file)
    {
        $this->file = $file;

        return $this;
    }

    public function upload()
    {
        $this->composeFileName();

        $this->flysystem->write($this->getPath(), fopen($this->file, 'r+'),
            [
                'visibility' => 'public',
                'Expires'    => Carbon::now()->addYears(1),
            ]
        );

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
        $this->uploadedFileName = str_random(16).'.'.$this->file->getClientOriginalExtension();
    }
}
