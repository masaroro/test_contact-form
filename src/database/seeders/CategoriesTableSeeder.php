<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $param = [
            'name' => '商品のお届けについて',
        ];
        DB::table('categories')->insert($param);
        $param = [
            'name' => '商品の交換について',
        ];
        DB::table('categories')->insert($param);
        $param = [
            'name' => '商品トラブル',
        ];
        DB::table('categories')->insert($param);
                $param = [
            'name' => 'ショップへの問い合わせ',
        ];
        DB::table('categories')->insert($param);
                $param = [
            'name' => 'その他',
        ];
        DB::table('categories')->insert($param);
    }
}
