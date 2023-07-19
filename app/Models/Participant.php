<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    
    public $timestamps=false;
    protected $table="participants";
    protected $fillable = ['user_id','chat_id','role'];
    protected $casts = [
        'joined_at' => 'datetime',
    ];
}