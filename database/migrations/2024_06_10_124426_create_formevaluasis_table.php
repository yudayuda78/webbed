<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormevaluasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formevaluasis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('email');
            $table->string('nama');
            $table->string('instansi');
            $table->string('nomorwa');
            $table->string('nilaipanitia');
            $table->string('topikdiminati');
            $table->string('saran')->nullable();
            $table->string('buktitransfer')->nullable();
            $table->string('nominal')->nullable();
            $table->string('bank')->nullable();
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
        Schema::dropIfExists('formevaluasis');
    }
}
