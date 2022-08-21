<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Seeder;

class PricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //一般区分作成
        $param = [
            'item' => '月パス',
            'price' => '9460',
            'class' => '0',
        ];
        Price::create($param);

        $param = [
            'item' => '1日',
            'price' => '1870',
            'class' => '0',
        ];
        Price::create($param);

        $param = [
            'item' => '2時間',
            'price' => '1540',
            'class' => '0',
        ];
        Price::create($param);

        $param = [
            'item' => '1時間',
            'price' => '990',
            'class' => '0',
        ];
        Price::create($param);


        //専門,大学区分作成
        $param = [
            'item' => '月パス',
            'price' => '7920',
            'class' => '1',
        ];
        Price::create($param);

        $param = [
            'item' => '1日',
            'price' => '1540',
            'class' => '1',
        ];
        Price::create($param);

        $param = [
            'item' => '2時間',
            'price' => '1320',
            'class' => '1',
        ];
        Price::create($param);

        $param = [
            'item' => '1時間',
            'price' => '770',
            'class' => '1',
        ];
        Price::create($param);


        //高校生以下区分作成
        $param = [
            'item' => '月パス',
            'price' => '5500',
            'class' => '2',
        ];
        Price::create($param);

        $param = [
            'item' => '1日',
            'price' => '1100',
            'class' => '2',
        ];
        Price::create($param);

        $param = [
            'item' => '2時間',
            'price' => '880',
            'class' => '2',
        ];
        Price::create($param);

        $param = [
            'item' => '1時間',
            'price' => '550',
            'class' => '2',
        ];
        Price::create($param);


        //キッズ区分作成
        $param = [
            'item' => 'キッズウォール',
            'price' => '500',
            'class' => '3',
        ];
        Price::create($param);


        //レンタル区分作成
        $param = [
            'item' => 'シューズ',
            'price' => '300',
            'class' => '5',
        ];
        Price::create($param);

        $param = [
            'item' => 'チョーク',
            'price' => '200',
            'class' => '5',
        ];
        Price::create($param);

        $param = [
            'item' => 'ロープ',
            'price' => '300',
            'class' => '5',
        ];
        Price::create($param);

        $param = [
            'item' => 'ハーネス',
            'price' => '200',
            'class' => '5',
        ];
        Price::create($param);

        $param = [
            'item' => 'ビレイ券',
            'price' => '500',
            'class' => '5',
        ];
        Price::create($param);
    }
}
