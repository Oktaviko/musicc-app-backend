<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;

    protected $table = 'studio';

    protected $fillable = [
        'nama_band',
        'jam_sewa',
        'hari',
        'durasi',
        'pembayaran',
        'total_harga',
        'status',
    ];
}
