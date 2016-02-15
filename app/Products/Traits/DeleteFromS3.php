<?php namespace App\Products\Traits;

use Illuminate\Support\Facades\Storage;
use League\Flysystem\FileNotFoundException;

trait DeleteFromS3 {
    public static function deleteS3File($path)
    {
        try {
            Storage::delete($path);
        } catch(FileNotFoundException $e) {
            //Do nothing
        }
    }
}
