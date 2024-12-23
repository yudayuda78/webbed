<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormpendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formpendaftarans', function (Blueprint $table) {
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
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
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
        Schema::dropIfExists('formpendaftarans');
    }
}
