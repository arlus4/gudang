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
            $table->foreignId('pelanggan_id')->reference('id')->on('pelanggans');
            $table->foreignId('agen_id')->reference('id')->on('agens')->nullable();
            $table->foreignId('kasir_id')->reference('id')->on('kasirs')->nullable();
            $table->string('invoice');
            $table->string('slug');
            $table->date('tanggal_penjualan')->nullable();
            $table->string('total_harga');
            $table->enum('kategori_pembayaran', ['cash', 'tempo'])->nullable();
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
        Schema::dropIfExists('penjualans');
    }
}
