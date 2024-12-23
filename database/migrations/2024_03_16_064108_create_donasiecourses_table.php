<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasiecoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasiecourses', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nomorwa');
            $table->string('email');
            $table->string('judul');
            $table->string('bank');
            $table->string('bukti')->nullable();
            $table->string('nominal');
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
        Schema::dropIfExists('donasiecourses');
    }
}
