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
        //DB::table('news')->insert();
    }

    public function getData()
    {
        //не совсем понял, надо было через seeder заполнять, или как-то по другому
//        $data = [
//            [
//            'title' => 'Спорт',
//            'slug' => 'sports'
//            ],
//            [
//            'title' => 'Политика',
//            'slug' => 'politics'
//            ]
//        ];
    }
}
