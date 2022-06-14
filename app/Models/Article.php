<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'topic';

    protected $keyType = 'string';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'author',
        'topic',
        'category',
        'image',
        'body',
        'type',
        'thumbnail',
        'tags',
        'views'
    ];

    public function cat()
    {
        return $this->hasOne(Category::class, 'id', 'category');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article', 'id');
    }

    public function hasThumbnail(): bool
    {
        return !\is_null($this->thumbnail);
    }

    public function hasImage(): bool
    {
        return !\is_null($this->image);
    }

    public function getThumbnail(): string
    {
        return Storage::get($this->thumbnail);
    }

    public function getImage(): string
    {
        return Storage::get($this->image);
    }
}
