<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'tbl_admins';
    protected $username = 'acc';
    protected $password = 'pwd';
    protected $primaryKey = "id";
    protected $timestamp = false;
    protected $guard = 'admins';
    protected $fillable = [
        'id',
        'acc',
        'pwd',
        'full_name',
        'phone_num',
        'email',
        'role',
        'remember_token'
    ];
    protected $hidden = [
        'pwd',
        'remember_token'
    ];
}
