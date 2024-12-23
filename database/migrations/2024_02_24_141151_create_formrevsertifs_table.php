<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormrevsertifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formrevsertifs', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('nama');
            $table->string('instansi');
            $table->string('whatsapp');
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
        Schema::dropIfExists('formrevsertifs');
    }
}
