<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Purchase;
use App\Models\Product;
use Illuminate\Support\Facades\DB;



use function Laravel\Prompts\select;

class ProductPurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        for ($i = 0; $i < 1000; $i++){
            $product = Product::orderByRaw("RAND()")->first();
            $set_product_id = $product->id;
            $set_product_price = $product->price;
            $set_purchase_id = Purchase::select('id')->orderByRaw("RAND()")->first()->id;
            DB::table('product_purchase')->insert(
                [
                    'product_id'=>$set_product_id,
                    'purchase_id'=>$set_purchase_id,
                    'quantity'=>rand(1,10),
                    'purchase_product_price'=>$set_product_price,
                ]
            );
        }

    }
}
