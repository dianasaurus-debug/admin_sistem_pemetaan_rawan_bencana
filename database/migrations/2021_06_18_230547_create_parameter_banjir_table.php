<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParameterBanjirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameter_banjir', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_drainase')->unsigned();
            $table->bigInteger('id_curahhujan')->unsigned();
            $table->bigInteger('id_kepadatan_penduduk')->unsigned();
            $table->integer('ch_volume');
            $table->integer('riwayat_bencana');
            $table->string('kapasitas_drainase');
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
        Schema::dropIfExists('parameter_banjir');
    }
}
