<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //
      User::create([
        'username' => 'admin',
        'email' => 'admin@example.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      User::create([
        'username' => 'edward',
        'email' => 'edward@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);
    }
}
