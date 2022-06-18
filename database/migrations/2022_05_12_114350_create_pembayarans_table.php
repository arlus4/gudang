<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penjualan_id')->reference('id')->on('penjualans');
            $table->foreignId('agen_id')->reference('id')->on('agens')->nullable();
            $table->foreignId('kasir_id')->reference('id')->on('kasirs')->nullable();
            $table->string('invoice');
            $table->string('slug');
            $table->string('total_harga');
            $table->enum('kategori_pembayaran', ['cash', 'tempo'])->nullable();
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
        Schema::dropIfExists('pembayarans');
    }
}
