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
        DB::table('images')->insert([
            [
                'filename' => 'sample1.png',
                'title' => null
            ],
            [
                'filename' => 'sample2.png',
                'title' => null
            ],
            [
                'filename' => 'sample3.png',
                'title' => null
            ],
            [
                'filename' => 'sample4.png',
                'title' => null
            ],
            [
                'filename' => 'sample5.png',
                'title' => null
            ],
            [
                'filename' => 'sample6.png',
                'title' => null
            ]]);
    }
}
