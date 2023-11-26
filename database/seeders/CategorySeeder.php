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
        DB::table('primary_categories')->insert([
            [
                'name' => 'iPhone',
                'sort_order' => 1,
            ],
            [
                'name' => 'iPad',
                'sort_order' => 2,
            ],
            [
                'name' => 'MacBook',
                'sort_order' => 3,
            ],
            [
                'name' => 'AppleWatch',
                'sort_order' => 4,
            ],
            [
                'name' => 'AirPods & イヤホン',
                'sort_order' => 5,
            ],
            ]);

        DB::table('secondary_categories')->insert([
            [
                'name' => 'iPhone 12',
                'sort_order' => 1,
                'primary_category_id' => 1
            ],
            [
                'name' => 'iPhone 13',
                'sort_order' => 2,
                'primary_category_id' => 1
            ],
            [
                'name' => 'iPhone 14',
                'sort_order' => 3,
                'primary_category_id' => 1
            ],
            [
            'name' => 'iPad mini',
            'sort_order' => 4,
            'primary_category_id' => 2
            ],
            [
                'name' => 'iPad Air',
                'sort_order' => 5,
                'primary_category_id' => 2
            ],
            [
                'name' => 'iPad Pro',
                'sort_order' => 6,
                'primary_category_id' => 2
            ],
            [
                'name' => 'MacBook Air',
                'sort_order' => 7,
                'primary_category_id' => 3
            ],
            [
                'name' => 'MacBook Pro',
                'sort_order' => 8,
                'primary_category_id' => 3
            ],
            [
                'name' => 'Apple Watch 7',
                'sort_order' => 9,
                'primary_category_id' => 4
            ],
            [
                'name' => 'Apple Watch 8',
                'sort_order' => 10,
                'primary_category_id' => 4
            ],
            [
                'name' => 'AirPods Pro',
                'sort_order' => 11,
                'primary_category_id' => 5
            ],
            [
                'name' => 'AirPods 3',
                'sort_order' => 12,
                'primary_category_id' => 5
            ],
        ]);
        }
}
