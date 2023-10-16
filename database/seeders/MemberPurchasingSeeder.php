<?php

namespace Database\Seeders;

// add model
use App\Models\MemberPurchasing;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberPurchasingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //
      MemberPurchasing::create([
        'member_id' => 1, // Ganti dengan ID anggota yang sesuai
        'product_id' => 1, // Ganti dengan ID produk yang sesuai
        'total_price' => 100.00,
        'purchase_date' => '2023-10-15',
      ]);
    }
}
