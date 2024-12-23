<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormpendaftaranworkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formpendaftaranworkshops', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('nama');
            $table->string('instansi');
            $table->string('profesi');
            $table->string('email');
            $table->string('whatsapp');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('status');
            $table->string('sudahpernah');
            $table->string('informasi');
            $table->string('sudahshare');
            $table->string('sudahgabung');
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
        Schema::dropIfExists('formpendaftaranworkshops');
    }
}
