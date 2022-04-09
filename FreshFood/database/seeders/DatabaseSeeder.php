<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SaleSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(JudgeSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(PostSeeder::class);
    }
}
