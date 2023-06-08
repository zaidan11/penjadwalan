<?php

namespace Database\Seeders;

use App\Models\data_dosen;
use App\Models\data_mhs;
use App\Models\User;
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
            'nama' => 'Admin',
            'nim' => 'I0719075',
            'role' => 'admin',
            'email' => 'zaidanalvin@gmail.com',
            'password' => bcrypt('12345')
        ]);
        User::create([
            'nama' => 'zaidan',
            'nim' => 'I0719076',
            'role' => 'user',
            'email' => 'zaidan110600@gmail.com',
            'password' => bcrypt('12345')
        ]);
    }
}
