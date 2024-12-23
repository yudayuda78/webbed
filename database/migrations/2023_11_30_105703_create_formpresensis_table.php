<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormpresensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formpresensis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('nama');
            $table->string('instansi');
            $table->string('posisi');
            $table->string('email');
            $table->string('whatsapp');
            $table->string('provinsi');
            $table->string('kota');
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
        Schema::dropIfExists('formpresensis');
    }
}
