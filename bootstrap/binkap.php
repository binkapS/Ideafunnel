<?php

use App\Binkap\Pairs;
use App\Models\Category;

function categories(int $limit = null)
{
    return \is_null($limit)
        ? Category::all(['id', 'name'])
        : Category::limit($limit)->get(['id', 'name']);
}

function topic(string $topic, bool $output = true)
{
    if ($output) {
        return str_replace(" ", "_", $topic);
    }
    if (str_contains($topic, '%')) {
        return str_replace('%', " ", $topic);
    }
    return str_replace("_", " ", $topic);
}

function body(string $body, bool $output = true)
{
    if ($output) {
        return htmlspecialchars_decode($body);
    }
    return htmlspecialchars($body);
}

function articleType(string|int $key = null)
{
    return \is_null($key)
        ? Pairs::$articleTypes
        : Pairs::$articleTypes[$key];
}
