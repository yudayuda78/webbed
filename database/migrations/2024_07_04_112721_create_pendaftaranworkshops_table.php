<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranworkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaranworkshops', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->foreignId('header_id');
            $table->string('kegiatan');
            $table->string('fasilitas');
            $table->string('jenis');
            $table->string('pmm')->nullable();
            $table->string('telegram')->nullable();
            $table->string('linktree')->nullable();
            $table->tinyInteger('dibuka');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('pendaftaranworkshops');
    }
}
