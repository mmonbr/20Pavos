<?php

namespace App\Products\Traits;

use League\Flysystem\FileNotFoundException;
use GrahamCampbell\Flysystem\Facades\Flysystem;

trait DeleteFromS3
{
    public static function deleteS3File($path)
    {
        try {
            Flysystem::connection('awss3')->delete($path);
        } catch (FileNotFoundException $e) {
            //Do nothing
        }
    }
}
