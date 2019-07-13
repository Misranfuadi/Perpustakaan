<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denda', function (Blueprint $table) {
            $table->integer('id_pinjam')->unsigned()->primary('id_pinjam');
            $table->string('jumlah', 10);
            $table->date('tggl_bayar');
            $table->enum('is_dibayar', ['y', 'n']);
            $table->timestamps();
            $table->foreign('id_pinjam')->references('id')->on('peminjaman')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('denda');
    }
}
