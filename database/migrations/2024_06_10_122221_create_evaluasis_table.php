<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluasis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('topik')->nullable();
            $table->string('pembicara1')->nullable();
            $table->string('pembicara2')->nullable();
            $table->string('pembicara3')->nullable();
            $table->string('pembicara4')->nullable();
            $table->string('jenis');
            $table->string('createdby');
            $table->string('lasteditedby');
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
        Schema::dropIfExists('evaluasis');
    }
}
