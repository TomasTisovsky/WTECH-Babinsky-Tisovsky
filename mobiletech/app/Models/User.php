<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $table = 'users';

    protected $fillable = [
        'name',
        'surname',
        'email',
        'role',
        'cart_id',
        'password',
    ];


    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
}
