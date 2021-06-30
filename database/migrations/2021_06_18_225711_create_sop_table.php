<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sop', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_sop');
            $table->tinyInteger('jenis_bencana')->comment = "0:Banjir, 1:Kekeringan, 2:longsor, 3:putingbeliung";
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
        Schema::dropIfExists('sop');
    }
}
