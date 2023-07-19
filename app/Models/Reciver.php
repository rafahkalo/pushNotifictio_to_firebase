<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reciver extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table="recivers";
    protected $fillable = ['user_id','message_id'];
    protected $casts = [
        'read_at' => 'datetime',
    ];
}