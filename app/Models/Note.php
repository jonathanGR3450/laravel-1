<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'notable_id', 'notable_type'];

    public $timestamps = true;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function notable()
    {
        return $this->morphTo();
    }
}
