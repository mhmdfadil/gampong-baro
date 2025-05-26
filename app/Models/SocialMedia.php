<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'social_medias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'link_fb',
        'active_fb',
        'link_ig',
        'active_ig',
        'link_yt',
        'active_yt',
        'link_wa',
        'active_wa'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'active_fb' => 'boolean',
        'active_ig' => 'boolean',
        'active_yt' => 'boolean',
        'active_wa' => 'boolean',
    ];
}