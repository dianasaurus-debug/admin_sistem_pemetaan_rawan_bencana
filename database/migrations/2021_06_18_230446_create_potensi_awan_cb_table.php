<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePotensiAwanCbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potensi_awan_cb', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kecamatan')->unsigned();
            $table->integer('potensi_awan');
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
        Schema::dropIfExists('potensi_awan_cb');
    }
}
