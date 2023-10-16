<?php

namespace Database\Seeders;

// add model
use App\Models\MemberStample;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberStampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        MemberStample::create([
          'member_purchasing_id' => 1,
          'quantity_purchased' => 5,
          'purchase_date' => '2023-10-15',
          'purchase_card_number' => 12345,
          'stample_card' => 'Stample Card',
        ]);

        MemberStample::create([
          'member_purchasing_id' => 1,
          'quantity_purchased' => 5,
          'purchase_date' => '2023-10-15',
          'purchase_card_number' => 12345,
          'stample_card' => 'Stample Card',
        ]);

        MemberStample::create([
          'member_purchasing_id' => 1,
          'quantity_purchased' => 5,
          'purchase_date' => '2023-10-15',
          'purchase_card_number' => 12345,
          'stample_card' => 'Stample Card',
        ]);
    }
}
