<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStasiunHujanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stasiun_hujan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kecamatan')->unsigned();
            $table->string('sh_nomor');
            $table->string(('sh_nama'));
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
        Schema::dropIfExists('stasiun_hujan');
    }
}
