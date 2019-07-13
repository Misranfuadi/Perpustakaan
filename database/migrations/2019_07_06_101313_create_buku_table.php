<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->increments('id');
            $table->string('isbn', 15);
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->string('foto')->nullable();
            $table->timestamps();
        });

        Schema::table('unit', function (Blueprint $table) {
            $table->foreign('id_buku')->references('id')
                ->on('buku')->onDelete('cascade')
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
        Schema::dropIfExists('judul');
    }
}
