<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; 

class User extends Authenticatable
{

    // protected $table = 'tb_users';

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code', 'created_at', 'email', 'enabled', 'modified_at',
        'password', 'phone_number', 'username', 'remember_token'
    ];

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
        'password' => 'hashed',
    ];

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->code = self::generateUserCode();
        });
    }

    protected static function generateUserCode()
    {
        $prefix = 'USR';
        $randomNumber = str_pad(mt_rand(0, 9999999999), 10, '0', STR_PAD_LEFT);
        return $prefix . $randomNumber;
    }

}
