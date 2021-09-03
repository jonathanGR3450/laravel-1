<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'message_id'];

    public $timestamps = true;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
