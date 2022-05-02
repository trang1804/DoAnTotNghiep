<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\config;

class ConfigSeeder extends Seeder
{
    public function run()
    {
        config::create([
            'logo'=>'images/logo/FT2b3fZxoLvY1VNxlUqvvFPCWKJ2nPRWg3Cw2lJG.png',
            'link_facebook'=>'https://www.facebook.com/',
            'link_twitter'=>'https://www.facebook.com/',
            'link_linkedin'=>'https://www.facebook.com/',
            'phone'=>"0976594507",
            'address'=>"Âu Cơ Tây Hồ Hà Nội",
            'email'=>"admin@gmail.com"
        ]);
    }
}
