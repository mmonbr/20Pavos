<?php

function cdn_file($file_path, $secure = true)
{
    $cdn = config('services.cloudfront.cdn');
    $url = config('services.cloudfront.url');

    if($cdn && $secure) return "https://{$cdn}/{$file_path}";
    if($cdn && !$secure) return "http://{$cdn}/{$file_path}";

    if(!$cdn && $secure) return "http://{$url}/{$file_path}";
    if(!$cdn && !$secure) return "http://{$url}/{$file_path}";
}

function http_file($file_path)
{
    $url = config('services.cloudfront.url');

    return "http://{$url}/{$file_path}";
}