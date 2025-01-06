<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model
{
    use HasFactory;

    protected $fillable = [
        'facebook_url',
        'twiter_url',
        'instgram_url',
        'github_url',
        'youtyope_url',
        'linkedin_url',
    ];
}