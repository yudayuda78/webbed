<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcoursenarsumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecoursenarsums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Ecourse_id');
            $table->string('pembicara')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('ttd')->nullable();
            $table->string('tanggaldibuat')->nullable();
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
        Schema::dropIfExists('ecoursenarsums');
    }
}
