<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penjualan_id')->reference('id')->on('penjualans');
            $table->foreignId('pelanggan_id');
            $table->foreignId('agen_id');
            $table->string('invoice');
            $table->string('slug');
            $table->date('tanggal_bayar');
            $table->string('jumlah_bayar');
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
        Schema::dropIfExists('tempos');
    }
}
