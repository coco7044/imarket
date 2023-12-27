<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProfileInfo>
 */
class UserProfileInfoFactory extends Factory
{

    private static int $sequence = 1;

    public function definition(): array
    {
        $tel = str_replace('-', '', $this->faker->phoneNumber);
        $address = mb_substr($this->faker->address, 9);
        $date = $this->faker->dateTimeBetween('-1year');

        return [
            'name' => $this->faker->name,
            'kana' => $this->faker->kanaName,
            'user_id' => self::$sequence++,
            'tel' => $tel,
            'postcode' => $this->faker->postcode,
            'address' => $address,
            'gender' => $this->faker->numberBetween(0, 2),
            'created_at' => $date,
            'updated_at' => $date,  
        ];
    }
}
