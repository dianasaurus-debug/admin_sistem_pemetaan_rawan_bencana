<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatBencanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_bencana', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_jenis_bencana')->unsigned();
            $table->bigInteger('id_kelurahan')->unsigned();
            $table->string('rb_kerusakan');
            $table->integer('rb_kerugian');
            $table->string('rb_longitude');
            $table->string('rb_latitude');
            $table->string('rb_status_perbaikan');
            $table->integer('rb_bulan');
            $table->integer('rb_tahun');
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
        Schema::dropIfExists('riwayat_bencana');
    }
}
