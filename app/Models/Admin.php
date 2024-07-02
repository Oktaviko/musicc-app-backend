<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Ubah dari Model ke Authenticatable

class Admin extends Authenticatable
{
    use HasFactory;

    // Tentukan table yang akan digunakan oleh model ini
    protected $table = 'admins';

    // Tentukan atribut yang dapat diisi secara massal
    protected $fillable = [
        'email',
        'password',
    ];

    // Sembunyikan atribut yang tidak ingin dikembalikan saat mengakses model
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Tentukan tipe data yang seharusnya
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
