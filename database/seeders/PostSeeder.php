<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ja_JP');

        $titles = [
            'Laravelの基本を学ぼう',
            'PHPでブログを作成してみた',
            'Web開発に必要な知識とは？',
            'プログラミング初心者におすすめの教材',
            'リモートワークでの生産性向上方法',
        ];

        $categoryIds = [1, 2, 3, 4, 5];
        $userIds = [1, 2, 3];

        foreach (range(1, 35) as $i) {
            DB::table('posts')->insert([
                'title' => $faker->randomElement($titles),
                'contents' => $faker->realText(200),
                'user_id' => $faker->randomElement($userIds),
                'category_id' => $faker->randomElement($categoryIds),
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now(),
            ]);
        }
    }
}
