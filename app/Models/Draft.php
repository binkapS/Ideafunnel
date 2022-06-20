<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Draft extends Model
{
    use HasFactory, SoftDeletes;

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
        'image',
        'body',
        'tags',
        'category',
        'type'
    ];

    public function aut()
    {
        return $this->hasOne(User::class, 'id', 'author');
    }

    public function hasImage(): bool
    {
        return !\is_null($this->image);
    }
}
