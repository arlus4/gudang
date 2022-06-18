<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agen_rewards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agen_id')->references('id')->on('agens');
            $table->string('persentase');
            $table->string('jumlah');
            $table->date('tanggal_bayar');
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
        Schema::dropIfExists('agen_rewards');
    }
}
