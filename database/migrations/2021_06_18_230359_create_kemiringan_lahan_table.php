<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKemiringanLahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kemiringan_lahan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kecamatan')->unsigned();
            $table->bigInteger('id_kelurahan')->unsigned();
            $table->integer('kemiringan_indeks');
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
        Schema::dropIfExists('kemiringan_lahan');
    }
}
