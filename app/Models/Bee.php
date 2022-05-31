<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'cover',
        'slug',
        'headline',
        'content',
    ];
}
