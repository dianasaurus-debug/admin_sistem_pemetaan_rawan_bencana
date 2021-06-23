<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParameterLongsorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameter_longsor', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kemiringan')->unsigned();
            $table->bigInteger('id_curahhujan')->unsigned();
            $table->integer('ch_volume');
            $table->integer('riwayat_bencana');
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
        Schema::dropIfExists('parameter_longsor');
    }
}
