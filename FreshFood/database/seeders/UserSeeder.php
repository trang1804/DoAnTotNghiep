<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use  App\Models\GroupUser;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        // admin 
        foreach(range(1, 1) as $index){
            $name = $faker->name();
            User::create([
                'avatar'=>"https://webmaudep.com/demo/thucpham/tp01/images/product-5.jpg",
                'fullname'=>$name,
                'address'=> $faker->address(),
                'phone' => $faker->phoneNumber(),
                'email'=>"admin@gmail.com",
                'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
                'status' => 1,
                'is_admin'=> 1,
                'role_id'=>2
            ]);
        }
        // khách hàng
        foreach(range(1, 1) as $index){
            $name = $faker->name();
            User::create([
                'avatar'=>"https://webmaudep.com/demo/thucpham/tp01/images/product-5.jpg",
                'fullname'=>$name,
                'address'=> $faker->address(),
                'address_detail'=> $faker->address(),
                'phone' => $faker->phoneNumber(),
                'email'=>'user@gmail.com',
                'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
                'status' => 1,
                'is_admin'=> 0,
                'role_id'=>1,
                'group_user'=>GroupUser::all()->random()->id
            ]);
        }
        // DB::table('users')->insert([
        //     [   
        //         'avatar' => 'https://webmaudep.com/demo/thucpham/tp01/images/product-5.jpg',
        //         'fullname' => 'Khuất Thu Trang',
        //         'address' => 'Thạch Thất, Hà Nội',
        //         'phone' => '0528134984',
        //         'email' => 'thutrangk2000@gmail.com',
        //         'password' => bcrypt('123456789'),
        //         'status' => '1',
        //         'is_admin'=> '1',
        //         'role_id'=>2
        //     ],
        //     [   
        //         'avatar' => 'https://webmaudep.com/demo/thucpham/tp01/images/product-5.jpg',
        //         'fullname' => 'Vũ Xuân Thanh',
        //         'address' => 'Quỳnh Thụ, Thái Bình',
        //         'phone' => '0365478953',
        //         'email' => 'thanhvu18@gmail.com',
        //         'password' => bcrypt('123456789'),
        //         'status' => '1',
        //         'is_admin'=> '1',
        //         'role_id'=>2
        //     ],
        //     [
        //         'avatar' => 'https://webmaudep.com/demo/thucpham/tp01/images/product-5.jpg',
        //         'fullname' => 'Nguyễn Thị Ngọc Hoa',
        //         'address' => 'Hải Dương',
        //         'phone' => '0528134987',
        //         'email' => 'ngannguyen@gmail.com',
        //         'password' => bcrypt('123456789'),
        //         'status' => '1',
        //         'is_admin'=> '1',
        //         'role_id'=>2
        //     ],
        //     [   
        //         'avatar' => 'https://webmaudep.com/demo/thucpham/tp01/images/product-5.jpg',
        //         'fullname' => 'Nguyễn Mai Hương',
        //         'address' => 'Bắc Giang',
        //         'phone' => '0363874921',
        //         'email' => 'maihuong@gmail.com',
        //         'password' => bcrypt('123456789'),
        //         'status' => '1',
        //         'is_admin'=> '1',
        //         'role_id'=>2
        //     ],
        //     [
        //         'avatar' => 'https://webmaudep.com/demo/thucpham/tp01/images/product-5.jpg',
        //         'fullname' => 'Trần Ngọc Lan',
        //         'address' => 'Nam Định',
        //         'phone' => '0368749272',
        //         'email' => 'ngoclan289@gmail.com',
        //         'password' => bcrypt('123456789'),
        //         'status' => '0',
        //         'is_admin'=> '1',
        //         'role_id'=>2
        //     ],
        //     [   
        //         'avatar' => 'https://webmaudep.com/demo/thucpham/tp01/images/product-5.jpg',
        //         'name' => 'Trần Ngọc Tường Vi',
        //         'address' => 'Hải Dương',
        //         'phone' => '0368763972',
        //         'email' => 'tươngvi0909@gmail.com',
        //         'password' => bcrypt('123456789'),
        //         'status' => '1',
        //         'is_admin'=> '1',
        //         'role_id'=>2
        //     ],
        //     [   
        //         'avatar' => 'https://webmaudep.com/demo/thucpham/tp01/images/product-5.jpg',
        //         'name' => 'Hoàng Thị Ngọc Huyền',
        //         'address' => 'Hồ Chí Minh',
        //         'phone' => '0368786392',
        //         'email' => 'huyenhoang0309@gmail.com',
        //         'password' => bcrypt('123456789'),
        //         'status' => '0',
        //         'is_admin'=> '1',
        //         'role_id'=>2
        //     ],
        //     [   
        //         'avatar' => 'https://webmaudep.com/demo/thucpham/tp01/images/product-5.jpg',
        //         'name' => 'Hoàng Nam Long',
        //         'address' => 'Hà Nội',
        //         'phone' => '0972364892',
        //         'email' => 'namlong@gmail.com',
        //         'password' => bcrypt('123456789'),
        //         'status' => '1',
        //         'is_admin'=> '1',
        //         'role_id'=>2
        //     ],
        //     [   
        //         'avatar' => 'https://webmaudep.com/demo/thucpham/tp01/images/product-5.jpg',
        //         'name' => 'Trương Hoài Nam',
        //         'address' => 'Hà Nội',
        //         'phone' => '0363698473',
        //         'email' => 'hoainam@gmail.com',
        //         'password' => bcrypt('123456789'),
        //         'status' => '1',
        //         'is_admin'=> '1',
        //         'role_id'=>2
        //     ],
        //     [   
        //         'avatar' => 'https://webmaudep.com/demo/thucpham/tp01/images/product-5.jpg',
        //         'name' => 'Ngô Hoàng Nguyên',
        //         'address' => 'Hà Nội',
        //         'phone' => '0363338473',
        //         'email' => 'hoangnguyen@gmail.com',
        //         'password' => bcrypt('123456789'),
        //         'status' => '1',
        //         'is_admin'=> '1',
        //         'role_id'=>2
        //     ]
        // ]);
    }
}
