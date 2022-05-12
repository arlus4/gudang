<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukHargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_hargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('stok_id')->reference('id')->on('produk_stoks');
            $table->foreignId('jasa_id')->reference('id')->on('produk_jasas');
            $table->string('slug')->unique();
            $table->date('harga_terkini');
            $table->decimal('harga_dasar');
            $table->decimal('harga_supplier');
            $table->decimal('harga_retail');
            $table->string('margin_harga_supplier');
            $table->string('margin_harga_retail');
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
        Schema::dropIfExists('produk_hargas');
    }
}
