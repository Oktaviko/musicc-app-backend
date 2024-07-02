<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studio', function (Blueprint $table) {
            $table->id();
            $table->string('nama_band');
            $table->string('jam_sewa'); // Ubah tipe data menjadi string
            $table->string('hari');
            $table->string('durasi');
            $table->string('pembayaran');
            $table->string('total_harga'); // Ubah tipe data menjadi string
            $table->string('status')->default('Pending'); // Tambahkan kolom status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studio');
    }
}

