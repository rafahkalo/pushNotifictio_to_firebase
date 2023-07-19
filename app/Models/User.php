<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'device_key',
    ];

public function messages()
{
  return $this->hasMany(Message::class,'user_id');
}
###########################

    public function chat(){

        return $this->belongsToMany(Chat::class,'participants','user_id','chat_id',)->withPivot(['role','joined_at']);

        }
        public function sendMessage(){

            return $this->hasMany(Message::class,'user_id');
        }
        public function recievedMessage(){

            return $this->belongsToMany(Message::class,'recivers')->withPivot(['read_at','deleted_at']);

            }




    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}