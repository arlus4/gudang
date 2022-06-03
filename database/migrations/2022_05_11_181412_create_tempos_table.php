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
            $table->foreignId('pembayaran_id')->reference('id')->on('pembayarans');
            $table->string('invoice');
            $table->string('slug');
            $table->string('total_harga');
            $table->date('tanggal_bayar')->nullable();
            $table->string('jumlah_bayar')->nullable();
            $table->string('sisa_bayar')->nullable();
            $table->date('tanggal_jatuh_tempo')->nullable();
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
        Schema::dropIfExists('tempos');
    }
}
