<?php

function cdn_file($file_path, $secure = true)
{
    $cdn = config('services.cloudfront.cdn');
    $url = config('services.cloudfront.url');

    if($cdn) return "{$cdn}/{$file_path}";

    if($secure) {
        return "https://{$url}/{$file_path}";
    } else {
        return "http://{$url}/{$file_path}";
    }

}