<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->truncate(); //2回目実行の際にシーダー情報をクリア
        for ($i = 0; $i < 10; $i++) {
            Member::create([
                'name' => Str::random(20),
                'mail' => Str::random(6) . '@example.com',
                'age' => mt_rand(1, 120),
                'gender' => 'male',
            ]);
        }
    }
}
