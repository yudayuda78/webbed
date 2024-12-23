<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsertifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsertifs', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->foreignId('header_id');
            $table->string('tanggal')->nullable();
            $table->string('nosertif')->nullable();
            $table->string('materi1')->nullable();
            $table->string('pembicara1')->nullable();
            $table->string('jabatan1')->nullable();
            $table->string('jp1')->nullable();
            $table->string('ttd1')->nullable();
            $table->string('materi2')->nullable();
            $table->string('pembicara2')->nullable();
            $table->string('jabatan2')->nullable();
            $table->string('jp2')->nullable();
            $table->string('ttd2')->nullable();
            $table->string('materi3')->nullable();
            $table->string('pembicara3')->nullable();
            $table->string('jabatan3')->nullable();
            $table->string('jp3')->nullable();
            $table->string('ttd3')->nullable();
            $table->string('materi4')->nullable();
            $table->string('pembicara4')->nullable();
            $table->string('jabatan4')->nullable();
            $table->string('jp4')->nullable();
            $table->string('ttd4')->nullable();
            $table->string('tanggaldibuat')->nullable();
            $table->string('createdby');
            $table->string('lasteditedby');
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
        Schema::dropIfExists('newsertifs');
    }
}
