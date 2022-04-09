<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'nameCate' => 'Củ quả các loại'
            ],
            [
                'nameCate' => 'Rau các loại'
            ],
            [
                'nameCate' => 'Thực phẩm'
            ],
            [
                'nameCate' => 'Trái cây'
            ],
            [
                'nameCate' => 'Các loại nấm'
            ]
        ]);
    }
}
