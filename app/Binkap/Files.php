<?php

namespace App\Binkap;

use Illuminate\Http\UploadedFile;

interface Files
{
    public function save(UploadedFile $file, string $path): string;

    public function url(string $file): string;
}
