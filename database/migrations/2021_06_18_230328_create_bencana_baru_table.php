<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBencanaBaruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bencana_baru', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_jenis_bencana')->unsigned();
            $table->bigInteger('id_kelurahan')->unsigned();
            $table->date('bb_tanggal');
            $table->string('bb_longitude');
            $table->string('bb_latitude');
            $table->string('bb_foto_bencana');
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
        Schema::dropIfExists('bencana_baru');
    }
}
