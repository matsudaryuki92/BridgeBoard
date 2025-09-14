<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProfileSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('ja_JP');

        foreach (range(1, 3) as $i) {
            DB::table('profiles')->insert([
                'bio' => $faker->realText(120),
                'user_id' => $i, // ユーザーIDが1〜10まで存在する前提
                'image_id' => $i, // image_id も仮に1〜10まであると仮定
            ]);
        }
    }
}
