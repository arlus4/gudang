<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('kasir_id')->nullable();
            $table->foreignId('tempo_id')->nullable();
            $table->foreignId('agen_id');
            $table->foreignId('pelanggan_id');
            $table->string('invoice');
            $table->string('slug');
            $table->date('tanggal_pesan');
            $table->string('total_harga');
            $table->string('total_produk');
            $table->string('pembayaran')->nullable();
            $table->enum('kategori_pembayaran', ['cash', 'tempo']);
            $table->boolean('approve')->default(false);
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
        Schema::dropIfExists('penjualans');
    }
}
