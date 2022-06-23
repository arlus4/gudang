<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_returns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penjualan_id')->reference('id')->on('penjualans')->nullable();
            $table->foreignId('pelanggan_id')->reference('id')->on('pelanggans')->nullable();
            $table->foreignId('agen_id')->reference('id')->on('agens')->nullable();
            $table->foreignId('kasir_id')->reference('id')->on('kasirs')->nullable();
            $table->string('invoice');
            $table->string('slug');
            $table->boolean('approve')->default(false);
            $table->boolean('accept')->default(false);
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
        Schema::dropIfExists('produk_returns');
    }
}
