<?php

namespace App\Binkap;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class Image implements Files
{
    public function save(UploadedFile $file, string $path = null): string
    {
        return $file->move($path, Str::random(25) . "." . $file->extension())->getPathname();
    }

    public function url(string $file): string
    {
        return \DIRECTORY_SEPARATOR . $file;
    }
}
