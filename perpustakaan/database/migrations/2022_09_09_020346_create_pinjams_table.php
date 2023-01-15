<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('databuku_id');
            $table->foreignId('status_id');
            $table->foreignId('siswa_id');
            $table->string('sinopsis');
            $table->string('book_id');
            $table->string('title');
            $table->integer('qty');
            $table->string('user');
            $table->string('id_user');
            $table->string('expire_date');
            $table->string('borrow_date');
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
        Schema::dropIfExists('pinjams');
    }
}
