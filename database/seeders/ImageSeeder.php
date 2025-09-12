<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert(
            [
                [
                    'filename' => 'profile_images/Icon1.png',
                ],
                [
                    'filename' => 'profile_images/Icon2.png',
                ],
            ]
        );
    }
}
