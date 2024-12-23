<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanGenerateSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_generate_soals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pertanyaan_id');
            $table->text('jawaban');
            $table->boolean('is_correct')->default(false);
            $table->timestamps();

            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaan_generate_soals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_generate_soals');
    }
}
