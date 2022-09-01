<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //member_numberはインクリメントさせたい
        static $member_number = 1;

        //生年月日は4年前から40年前までの中でランダムに決定
        $birthday = $this->faker->dateTimeBetween('-40years', '-4years')->format('Y-m-d');

        //年齢と会員クラスを対応させる
        $now = date('Ymd');
        $conv_birthday = str_replace('-', '', $birthday);
        $age = floor(($now - $conv_birthday) / 10000);
        if ($age < 5){
            $class = 3;
        } elseif ($age < 18){
            $class = 2;
        } elseif ($age < 22){
            $class = 1;
        } else {
            $class = 0;
        }

        return [
            'member_number' => $member_number++,
            'name' => $this->faker->name(),
            'gender' => $this->faker->numberBetween(0, 1),
            'birthday' => $birthday,
            'class' => $class,
            'grade' => $this->faker->numberBetween(0, 7),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make($birthday),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
