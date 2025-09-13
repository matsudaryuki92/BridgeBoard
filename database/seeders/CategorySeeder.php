<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => '旅行',
                'sort_order' => 1,
            ],
            [
                'name' => 'グルメ',
                'sort_order' => 2,
            ],
            [
                'name' => '日常',
                'sort_order' => 3,
            ],
            [
                'name' => '就活',
                'sort_order' => 4,
            ],
            [
                'name' => '勉強',
                'sort_order' => 5,
            ],
        ]);
    }
}
