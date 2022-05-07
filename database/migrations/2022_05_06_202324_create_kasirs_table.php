<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('kode')->unique();
            $table->string('slug')->unique();
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('email');
            $table->string('kontak');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->date('mulai_bekerja');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_kasir')->default(true);
            $table->text('alamat');
            $table->rememberToken();
            $table->string('photo_ktp', 2048)->nullable();
            $table->string('photo_profil', 2048)->nullable();
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
        Schema::dropIfExists('kasirs');
    }
}
