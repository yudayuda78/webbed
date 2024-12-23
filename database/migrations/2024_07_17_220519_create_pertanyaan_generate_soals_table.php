<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaanGenerateSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaan_generate_soals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('generatesoal_id');
            $table->text('pertanyaan');
            $table->timestamps();

            $table->foreign('generatesoal_id')->references('id')->on('generate_soals')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertanyaan_generate_soals');
    }
}
