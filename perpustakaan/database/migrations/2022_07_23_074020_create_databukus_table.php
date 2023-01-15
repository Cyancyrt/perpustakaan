<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('databukus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id');
            $table->string('sinopsis');
            $table->integer('bookid');
            $table->string('title');
            $table->integer('qty');
            $table->string('image');
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
        Schema::dropIfExists('databukus');
    }
}
