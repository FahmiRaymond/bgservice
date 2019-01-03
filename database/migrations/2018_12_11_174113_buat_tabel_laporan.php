<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelLaporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function(Blueprint $table){
            $table->increments('id_laporan');
            $table->date('tanggal');
            $table->integer('id_status');
            $table->string('pemilik')->nullable();
            $table->string('telepon')->nullable();
            $table->integer('id_merk')->unsigned();
            $table->string('model')->nullable();
            $table->string('no_imei')->nullable();
            $table->string('kerusakan');
            $table->bigInteger('biaya')->unsigned()->nullable();
            $table->text('keterangan')->nullable();
            $table->integer('id_sparepart')->unsigned()->nullable();
            $table->string('nama_barang')->nullable();
            $table->integer('harga')->nullable();
            $table->integer('laba')->nullable();
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
        Schema::drop('laporan');
    }
}
