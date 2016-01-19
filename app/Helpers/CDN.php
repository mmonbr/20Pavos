<?php

function cdn_file($file_path)
{
    $cdn = config('services.cloudfront.cdn');
    $url = config('services.cloudfront.url');

    if($cdn) return "{$cdn}/{$file_path}";

    return "{$url}/{$file_path}";
}