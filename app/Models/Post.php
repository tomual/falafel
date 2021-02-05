<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'images', 'thumbnail'];
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
