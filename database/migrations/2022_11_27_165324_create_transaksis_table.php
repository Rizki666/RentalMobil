<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('id_mobil');
            $table->string('id_user');
            $table->string('nama_pemesan');
            $table->string('harga');
            $table->string('merek');
            $table->string('tanggal_pembayaran');
            $table->string('metode_pembayaran');
            $table->string('tanggal_peminjaman');
            $table->string('tanggal_pengembalian');
            $table->string('no_hp_admin');
            $table->string('no_hp_pemesan');
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
        Schema::dropIfExists('transaksis');
    }
};
