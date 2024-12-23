<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevsertifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revsertifs', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('slug2')->unique();
            $table->foreignId('header_id');
            $table->string('kegiatan');
            $table->string('fasilitas');
            $table->string('jenis');
            $table->tinyInteger('dibuka');
            $table->string('createdby')->nullable();
            $table->string('lasteditedby')->nullable();
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
        Schema::dropIfExists('revsertifs');
    }
}
