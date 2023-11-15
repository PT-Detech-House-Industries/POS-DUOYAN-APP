<?php

namespace Database\Seeders;

use App\Models\MemberAward;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberAwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'name' => 'Basic',
                'point_minimum' => 100,
            ],
            [
                'name' => 'Gold',
                'point_minimum' => 200,
            ],
            [
                'name' => 'Platinum',
                'point_minimum' => 300,
            ],
        ];

        // Masukkan data ke dalam tabel member_award
        foreach ($data as $item) {
            MemberAward::create($item);
        }
    }
}
