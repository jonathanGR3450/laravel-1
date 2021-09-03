<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public $timestamps = true;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function messages()
    {
        return $this->morphedByMany(Message::class, 'taggable');
    }
}
