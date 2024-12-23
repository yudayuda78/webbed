<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNarsumsertifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('narsumsertifs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('newsertif_id');
            $table->string('materi')->nullable();
            $table->string('pembicara')->nullable();
            $table->string('jp')->nullable();
            $table->string('ttd')->nullable();
            $table->string('createdby');
            $table->string('lastediteddby');
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
        Schema::dropIfExists('narsumsertifs');
    }
}
