<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'slug',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
