<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_unit', 10);
            $table->integer('id_buku')->unsigned();
            $table->enum('is_ada', ['y', 'n']);
            $table->timestamps();
        });

        Schema::table('peminjaman', function (Blueprint $table) {
            $table->foreign('id_unit')->references('id')
                ->on('unit')->onDelete('cascade')
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
        Schema::dropIfExists('buku');
    }
}
