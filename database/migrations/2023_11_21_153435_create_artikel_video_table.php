<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel_video', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('artikel_id');
            $table->unsignedBigInteger('video_id');
            $table->timestamps();

            $table->foreign('artikel_id')->references('id')->on('artikels')->onDelete('cascade');
            $table->foreign('video_id')->references('id')->on('video_presensis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artikel_video');
    }
}
