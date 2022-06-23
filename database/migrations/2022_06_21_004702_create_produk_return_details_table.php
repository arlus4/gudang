<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukReturnDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_return_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_id')->reference('id')->on('penjualan_details');
            $table->foreignId('return-id')->reference('id')->on('produk_returns');
            $table->string('invoice');
            $table->string('slug');
            $table->string('kode_produk')->nullable();
            $table->string('nama_produk')->nullable();
            $table->string('jumlah_produk')->nullable();
            $table->string('harga_produk')->nullable();
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
        Schema::dropIfExists('produk_return_details');
    }
}
