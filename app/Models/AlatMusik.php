<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatMusik extends Model
{
    use HasFactory;

    protected $table = 'alatmusik';

    protected $fillable = [
        'nama',
        'no_hp',
        'instrumen',
        'hari',
        'durasi',
        'alamat',
        'pembayaran',
        'total_harga',
        'opsi',  // Tambahkan ini
        'status',
    ];

    protected $casts = [
        'total_harga' => 'string', // Pastikan ini dikonversi ke string
    ];
}
