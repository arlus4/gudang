<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penjualan_id')->reference('id')->on('penjualans');
            $table->foreignId('stok_id')->reference('id')->on('produk_stoks');
            $table->foreignId('harga_id')->reference('id')->on('produk_hargas');
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
        Schema::dropIfExists('penjualan_details');
    }
}
