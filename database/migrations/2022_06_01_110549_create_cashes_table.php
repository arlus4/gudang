<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembayaran_id')->reference('id')->on('pembayarans');
            $table->foreignId('agen_id')->reference('id')->on('agens')->nullable();
            $table->foreignId('kasir_id')->reference('id')->on('kasirs')->nullable();
            $table->string('invoice');
            $table->string('slug');
            $table->date('tanggal_bayar');
            $table->string('total_harga');
            $table->string('jumlah_bayar');
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
        Schema::dropIfExists('cashes');
    }
}
