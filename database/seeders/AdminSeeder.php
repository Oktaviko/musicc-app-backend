<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::updateOrCreate(
            ['email' => 'admin@gmail.com'], // Kondisi untuk mengecek apakah data sudah ada
            ['password' => Hash::make('admin123')] // Data yang akan diupdate atau dibuat
        );
    }
}
