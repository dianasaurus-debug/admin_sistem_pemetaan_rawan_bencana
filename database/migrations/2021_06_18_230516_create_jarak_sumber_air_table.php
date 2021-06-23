<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJarakSumberAirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jarak_sumber_air', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kelurahan')->unsigned();
            $table->bigInteger('id_kecamatan')->unsigned();
            $table->integer('jarak_sumberair');
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
        Schema::dropIfExists('jarak_sumber_air');
    }
}
