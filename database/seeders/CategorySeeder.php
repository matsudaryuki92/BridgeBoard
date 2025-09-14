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
            ['name' => 'Travel', 'slug' => 'travel'],
            ['name' => 'Gourmet', 'slug' => 'gourmet'],
            ['name' => 'Daily', 'slug' => 'daily'],
            ['name' => 'JobHunting', 'slug' => 'job_hunting'],
            ['name' => 'Study', 'slug' => 'study'],
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
