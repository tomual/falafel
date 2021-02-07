<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = ['site_name', 'cover_image', 'email', 'social_instagram', 'social_artstation', 'social_twitter', 'social_twitch', 'social_youtube', 'social_patreon'];
}
