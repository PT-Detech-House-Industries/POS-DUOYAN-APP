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
          'user_id' => 1,
          'name' => 'John Doe',
          'whatsapp_number' => '1234567890',
        ]);
    }
}
