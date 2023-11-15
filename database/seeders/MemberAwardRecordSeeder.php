<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MemberAwardRecord;
use App\Models\MemberAward;
use App\Models\Member;

class MemberAwardRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        MemberAwardRecord::create([
            'member_award_id' => 1,
            'member_id' => 1,
        ]);

        MemberAwardRecord::create([
            'member_award_id' => 2,
            'member_id' => 2,
        ]);
    }
}
