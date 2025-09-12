<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert(
            [
                [
                    'bio' => '自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！',
                    'user_id' => 1,
                    'image_id' => 1,
                ],
                [
                    'bio' => '自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！自己紹介が入るよ〜〜〜〜！',
                    'user_id' => 2,
                    'image_id' => 2,
                ],
            ]);
    }
}
