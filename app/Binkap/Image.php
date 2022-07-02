<?php

namespace App\Binkap;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class Image implements Files
{

    private static Image|null $self = null;

    public function save(UploadedFile $file, string $path = null): string
    {
        return $file->move($path, Str::random(25) . "." . $file->extension())->getPathname();
    }

    public function url(string $file): string
    {
        return \DIRECTORY_SEPARATOR . $file;
    }

    public function delete(string $file): bool
    {
        if (!\is_file($file)) {
            return false;
        }
        return \unlink($file);
    }

    public function rmdir(string $directory): bool
    {
        if (!\is_dir($directory)) {
            return false;
        }
        return \rmdir($directory);
    }

    public static function getInstance(): static
    {
        if (\is_null(static::$self)) {
            return static::$self = new static;
        }
        return static::$self;
    }
}
