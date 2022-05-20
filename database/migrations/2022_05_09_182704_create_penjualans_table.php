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
            $table->string('invoice');
            $table->string('slug');
            $table->foreignId('agen_id');
            $table->foreignId('pelanggan_id');
            $table->date('tanggal_pesan')->nullable();
            $table->string('total_harga');
            $table->string('pembayaran')->nullable();
            $table->enum('kategori_pembayaran', ['cash', 'tempo'])->nullable();
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
