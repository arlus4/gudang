<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukStoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_stoks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kasir_id');
            $table->string('kode')->unique();
            $table->string('slug')->unique();
            $table->string('nama');
            $table->text('deskripsi');
            $table->integer('jumlah_produk');
            $table->string('photo_produk', 2048)->nullable();
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
        Schema::dropIfExists('produk_stoks');
    }
}
