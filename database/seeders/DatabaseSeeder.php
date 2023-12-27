<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\UserProfileInfo;
use App\Models\User;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            ImageSeeder::class,
            CategorySeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
            StockSeeder::class,
            ProductPurchaseSeeder::class,
        ]);


        // Product::factory(100)->create();
        // Stock::factory(100)->create();
    }
}
