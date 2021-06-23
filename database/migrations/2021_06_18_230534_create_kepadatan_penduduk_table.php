<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepadatanPendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepadatan_penduduk', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kelurahan')->unsigned();
            $table->bigInteger('id_kecamatan')->unsigned();
            $table->integer('kepadatan_tahun');
            $table->integer('jumlah_penduduk');
            $table->integer('kepadatan_penduduk');
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
        Schema::dropIfExists('kepadatan_penduduk');
    }
}
