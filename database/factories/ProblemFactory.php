<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProblemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //ランダムに入れたい語句を配列に格納
        $array_color = [
            'あか',
            'あお',
            'きいろ',
            'みどり',
            'むらさき',
            'はいいろ',
            'くろ',
            'しろ',
            'オレンジ',
            'ピンク',
        ];
        $array_form = [
            '■',
            '/',
            '×',
            '▲',
            '●',
            '◆',
        ];
        $array_setter = [
            '店長',
            'オーナー',
            '佐々木',
            '菅原',
        ];

        return [
            //配列内のワードでランダム出力
            'dimension' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'grade' => $this->faker->randomElement(['00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '20', '21']),
            'hold_color' => $this->faker->randomElement($array_color),
            'tape_form' => $this->faker->randomElement($array_form),
            'setter' => $this->faker->randomElement($array_setter),
        ];
    }
}
