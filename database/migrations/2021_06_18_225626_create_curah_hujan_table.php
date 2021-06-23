<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurahHujanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curah_hujan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_stasiun')->unsigned();
            $table->integer('ch_volume');
            $table->string('ch_bulan');
            $table->integer('ch_tahun');
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
        Schema::dropIfExists('curah_hujan');
    }
}
