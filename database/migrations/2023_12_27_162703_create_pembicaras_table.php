<?php

use App\Models\Pembicara;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembicarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembicaras', function (Blueprint $table) {
            $table->id();
            $table->string('pembicara');
            $table->string('jabatan');
            $table->string('topik');
            $table->string('tanggal');
            $table->foreignId('event_id');
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
        Schema::dropIfExists('pembicaras');
    }
}
