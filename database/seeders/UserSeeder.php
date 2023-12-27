<?php

namespace Database\Seeders;

use App\Models\Purchase;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserProfileInfo;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => Hash::make('12345678'),
            'created_at' => '2021/01/01 11:11:11'
        ]);
        DB::table('users')->insert([
            'name' => 'test2',
            'email' => 'test2@test.com',
            'password' => Hash::make('12345678'),
            'created_at' => '2021/01/01 11:11:11'
        ]);
        DB::table('users')->insert([
            'name' => 'test3',
            'email' => 'test3@test.com',
            'password' => Hash::make('12345678'),
            'created_at' => '2021/01/01 11:11:11'
        ]);

        $users = User::factory(1000)->create();
        Purchase::factory(1000)->recycle($users)->create();
        UserProfileInfo::factory(1000)->recycle($users)->create();


    }
}
