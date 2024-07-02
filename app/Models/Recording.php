<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recording extends Model
{
    use HasFactory;

    protected $table = 'recordings';

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
