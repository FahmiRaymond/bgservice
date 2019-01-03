<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelServisan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servisan', function(Blueprint $table){
            $table->increments('id_servisan');
            $table->date('tanggal');
            $table->string('pemilik');
            $table->string('telepon');
            $table->integer('id_merk')->unsigned();
            $table->string('model');
            $table->string('no_imei')->nullable();
            $table->string('kerusakan');
            $table->bigInteger('biaya')->unsigned()->nullable();
            $table->text('keterangan')->nullable();
            $table->integer('id_status')->default(1);
            $table->timestamps();

            // $table->foreign('merk_id')->references('id')->on('merks')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('servisan');
    }
}
