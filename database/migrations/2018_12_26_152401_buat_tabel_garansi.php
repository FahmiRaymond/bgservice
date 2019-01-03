<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelGaransi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garansi', function(Blueprint $table){
            $table->increments('id_garansi');
            $table->date('tanggal');
            $table->integer('id_servisan');
            $table->string('pemilik');
            $table->string('telepon');
            $table->integer('id_merk')->unsigned();
            $table->string('model');
            $table->string('no_imei')->nullable();
            $table->string('kerusakan');
            $table->bigInteger('biaya')->nullable();
            $table->text('keterangan')->nullable();
            $table->integer('id_status')->default(1);
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
        Schema::drop('garansi');
    }
}
