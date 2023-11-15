<?php

namespace Database\Seeders;

use App\Models\Member;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Member::create([
          'user_id' => 2,
          'name' => 'edward',
          'number_member' => '324',
          'whatsapp_number' => '1234567890',
        ]);

        Member::create([
          'user_id' => 3,
          'name' => 'Meli',
          'number_member' => '324',
          'whatsapp_number' => '08123456789',
        ]);
    }
}
