<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecourses', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug');
            $table->boolean('bayar');
            $table->string('harga');
            $table->string('hargaawal');
            $table->string('diskon');
            $table->string('deskripsi');
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
        Schema::dropIfExists('ecourses');
    }
}
