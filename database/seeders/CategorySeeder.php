<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // カテゴリ名と手動でローマ字slugを対応させる方法（簡単で安全）
        $categories = [
            ['name' => '旅行', 'slug' => 'travel'],
            ['name' => 'グルメ', 'slug' => 'gourmet'],
            ['name' => '日常', 'slug' => 'daily'],
            ['name' => '就活', 'slug' => 'job_hunting'],
            ['name' => '勉強', 'slug' => 'study'],
        ];

        foreach ($categories as $index => $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'sort_order' => $index + 1,
                'slug' => $category['slug'],
            ]);
        }
    }
}
