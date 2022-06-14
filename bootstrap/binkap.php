<?php

use App\Models\Category;

function categories(int $limit = 5)
{
    return Category::limit($limit)->get(['id', 'name']);
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
