<?php

namespace Database\Seeders;

// add model
use App\Models\MemberDataPersonal;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberDataPersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Contoh pengisian data
        // DB::table('member_data_personal')->insert([
        //   'member_id' => 1,
        //   'date_of_birth' => '1990-05-15',
        //   'age' => 32,
        //   'gender' => 'Male',
        //   'geographic_location' => 'New York',
        //   'education' => 'Bachelor\'s Degree',
        //   'income' => '50000',
        // ]);

        MemberDataPersonal::create([
          'member_id' => 1,
          'birthday' => '1990-05-15',
          'age' => 32,
          'gender' => 'Male',
          'geographic_location' => 'New York',
          'education' => 'Bachelor\'s Degree',
          'income' => '50000',
        ]);

        // Anda dapat menambahkan data lain di sini
    }
}
