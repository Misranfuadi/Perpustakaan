<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nis', 10);
            $table->string('nama_siswa', 50);
            $table->enum('jenis_kelamin', ['p', 'w']);
            $table->integer('id_kelas')->unsigned();
            $table->timestamps();
        });
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->foreign('id_siswa')->references('id')
                ->on('siswa')->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
