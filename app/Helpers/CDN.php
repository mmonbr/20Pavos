<?php

function cdn_file($file_path, $secure = true)
{
    if (config('settings.files.use_cdn')) {
        $cdn = config('services.cloudfront.cdn');

        if ($secure) return "https://{$cdn}/{$file_path}";
        if (!$secure) return "http://{$cdn}/{$file_path}";
    } else {
        $url = config('services.cloudfront.url');

        if ($secure) return "https://{$url}/{$file_path}";
        if (!$secure) return "http://{$url}/{$file_path}";
    }
}

function http_file($file_path)
{
    $url = config('services.cloudfront.url');

    return "http://{$url}/{$file_path}";
}