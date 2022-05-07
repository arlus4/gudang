<?php

namespace Database\Seeders;

use App\Models\User;
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
    }
}
