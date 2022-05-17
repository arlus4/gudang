<?php

namespace Database\Seeders;

use App\Models\Agen;
use App\Models\User;
use App\Models\Kasir;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'nama' => 'Arfan Lusiandro',
            'slug' => 'arfan-lusiandro',
            'kode' => 'A1',
            'email' => 'admin@gmail.com',
            'kontak' => '089616',
            'username' => 'admin',
            'is_admin' => true,
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10)
        ]);

        Kasir::create([
            'user_id' => '1',
            'kode' => 'K1',
            'slug' => 'k1',
            'nama' => 'Sigit',
            'username' => 'sigit',
            'email' => 'sigit@gmail.com',
            'kontak' => '0899898',
            'tanggal_lahir' => '1997-05-07',
            'jenis_kelamin' => 'pria',
            'mulai_bekerja' => '2022-05-01',
            'password' => bcrypt('password'),
            'is_kasir' => true,
            'alamat' => 'Bogor',
            'remember_token' => Str::random(10),
        ]);

        Agen::create([
            'user_id' => '1',
            'kode' => 'A1',
            'slug' => 'a1',
            'nama' => 'Sigit',
            'username' => 'sigit',
            'email' => 'sigit@gmail.com',
            'kontak' => '0899898',
            'tanggal_lahir' => '1997-05-07',
            'jenis_kelamin' => 'pria',
            'mulai_bekerja' => '2022-05-01',
            'password' => bcrypt('password'),
            'is_agen' => true,
            'alamat' => 'Bogor',
            'remember_token' => Str::random(10),
        ]);
    }
}
