<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use  App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,10) as $index){
            Supplier::create([
                'nameSupplier' =>  $faker->name(),
                'address' => $faker->address(),
                'phone' => $faker->phoneNumber(),
                'status' => rand(0,1)
            ]);

    }
}
}
