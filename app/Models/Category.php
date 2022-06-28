<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';

    protected  $keyType = 'string';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'author',
        'name'
    ];

    public function articles()
    {
        return $this->hasMany(Article::class, 'category', 'id');
    }

    public function creator()
    {
        return $this->hasOne(User::class, 'id', 'author');
    }
}
