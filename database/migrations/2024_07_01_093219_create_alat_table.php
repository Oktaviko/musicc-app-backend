<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alatmusik', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_hp'); // Ubah tipe data menjadi string
            $table->string('instrumen');
            $table->string('hari');
            $table->string('durasi');
            $table->string('opsi');
            $table->string('alamat');
            $table->string('pembayaran');
            $table->string('total_harga'); // Ubah tipe data menjadi string
            $table->string('status')->default('Pending');
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
        Schema::dropIfExists('alatmusik');
    }
}
