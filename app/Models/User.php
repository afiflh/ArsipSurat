<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;  // Tambahkan jika ingin menggunakan notifikasi

class User extends Authenticatable
{
    use HasFactory, Notifiable;  // Menambahkan Notifiable jika menggunakan fitur notifikasi

    protected $table = 'users';
    protected $fillable = ['nama', 'email', 'password'];

    // Mutator untuk mengenkripsi password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    // Jika Anda menggunakan fitur email verifikasi atau token, bisa menambahkan
    // public function getAuthPassword()
    // {
    //     return $this->password;
    // }
}
