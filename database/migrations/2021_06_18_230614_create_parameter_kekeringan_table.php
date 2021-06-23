<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParameterKekeringanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameter_kekeringan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kepadatan_penduduk')->unsigned();
            $table->bigInteger('id_jarak')->unsigned();
            $table->integer('jumlah_penduduk');
            $table->integer('riwayat_bencana');
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
        Schema::dropIfExists('parameter_kekeringan');
    }
}
