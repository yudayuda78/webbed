<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranEcoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_ecourses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('ecourse_id');
            $table->string('nama');
            $table->string('email');
            $table->string('nomerwa');
            $table->string('bank');
            $table->string('ecourse_judul');
            $table->string('harga');
            $table->string('gambar');
            $table->string('status');
            
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
        Schema::dropIfExists('pembayaran_ecourses');
    }
}
