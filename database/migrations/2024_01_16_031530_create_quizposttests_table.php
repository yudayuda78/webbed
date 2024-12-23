<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizposttestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizposttests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ecourse_id');
            $table->unsignedInteger('nomor_pertanyaan');
            $table->string('pertanyaan');
            $table->string('a');
            $table->string('b');
            $table->string('c');
            $table->string('d');
            $table->string('jawabanbenar');
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
        Schema::dropIfExists('quizposttests');
    }
}
