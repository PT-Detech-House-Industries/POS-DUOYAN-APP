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
      // 1
      User::create([
        'username' => 'admin',
        'email' => 'admin@example.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 2
      User::create([
        'username' => 'edward',
        'email' => 'edward@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 3
      User::create([
        'username' => 'meli',
        'email' => 'meli@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 4
      User::create([
        'username' => 'jeffry',
        'email' => 'jeffry@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 5
      User::create([
        'username' => 'patrick',
        'email' => 'patrick@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 6
      User::create([
        'username' => 'christo',
        'email' => 'christo@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 7
      User::create([
        'username' => 'narni',
        'email' => 'narni@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 8
      User::create([
        'username' => 'hans',
        'email' => 'hans@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 9
      User::create([
        'username' => 'nana',
        'email' => 'nana@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 10
      User::create([
        'username' => 'tente_lili',
        'email' => 'tente_lili@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 11
      User::create([
        'username' => 'winda',
        'email' => 'winda@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 12
      User::create([
        'username' => 'grace_amelia',
        'email' => 'grace_amelia@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 13
      User::create([
        'username' => 'aulia',
        'email' => 'aulia@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 14
      User::create([
        'username' => 'marlin',
        'email' => 'marlin@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 15
      User::create([
        'username' => 'lintang',
        'email' => 'lintang@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 16
      User::create([
        'username' => 'sekar',
        'email' => 'sekar@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 17
      User::create([
        'username' => 'shinta',
        'email' => 'shinta@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 18
      User::create([
        'username' => 'alya',
        'email' => 'alya@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 19
      User::create([
        'username' => 'eva',
        'email' => 'eva@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 20
      User::create([
        'username' => 'feri',
        'email' => 'feri@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 21
      User::create([
        'username' => 'diah',
        'email' => 'diah@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 22
      User::create([
        'username' => 'bagus',
        'email' => 'bagus@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);

      // 23
      User::create([
        'username' => 'shanti',
        'email' => 'shanti@gmail.com',
        'whatsapp_number' => '0812345678',
        'password' => bcrypt('12345678'),
      ]);
    }
}
