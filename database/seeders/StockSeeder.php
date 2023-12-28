<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i < 169; $i++){
            DB::table('t_stocks')->insert([
                [
                    'product_id' => $i,
                    'type' => 1,
                    'quantity' => 10,
                ]
            ]
            );
        }
    }
}
