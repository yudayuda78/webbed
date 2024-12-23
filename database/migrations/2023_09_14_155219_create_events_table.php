<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('oleh')->nullable();
            $table->string('slug')->unique();
            $table->string('tanggalpelaksanaan')->nullable();
            $table->string('jampelaksanaan')->nullable();
            $table->string('copywriter')->nullable();
            $table->string('link')->nullable();
            $table->string('image')->nullable();
            $table->boolean('statuspelaksanaan')->default(false);
            $table->string('fasilitas')->nullable();

            $table->string('manfaat')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('textsertif')->nullable();
            $table->string('link_sertif')->nullable();
            $table->string('link_undangan')->nullable();
            $table->string('link_twibbon')->nullable();
            $table->string('telegram')->nullable();
            $table->string('linktree')->nullable();
            $table->string('pembicara1')->nullable();
            $table->string('pembicara2')->nullable();
            $table->string('pembicara3')->nullable();
            $table->string('pembicara4')->nullable();
            
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
        Schema::dropIfExists('events');
    }
}
