<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailHistory extends Model
{
    use HasFactory;

    protected $table = 'detail_histories';

    protected $fillable = [
        'year',
        'bg_year',
        'title',
        'description_singkat',
    ];
}