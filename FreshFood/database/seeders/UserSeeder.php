<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'TrangKhuat',
                'fullname' => 'Khuất Thu Trang',
                'avatar' => 'image/anhdd.jpg',
                'address' => 'Thạch Thất, Hà Nội',
                'phone' => '0866940634',
                'email' => 'thutrangk2000@gmail.com',
                'password' => bcrypt('12345678'),
                'status' => '1',
                'role' => '1',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10)
            ],
            [
                'username' => 'NgocNam',
                'fullname' => 'Nguyễn Ngọc Nam',
                'avatar' => 'image/anhav1.jpg',
                'address' => 'Bắc Từ Liêm, Hà Nội',
                'phone' => '0869846334',
                'email' => 'ngocnamkk@gmail.com',
                'password' => bcrypt('12345678'),
                'status' => '1',
                'role' => '1',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10)
            ],
            [
                'username' => 'MaiPhuong',
                'fullname' => 'Trương Mai Phương',
                'avatar' => 'image/anhav.jpg',
                'address' => 'Hai Bà Trưng, Hà Nội',
                'phone' => '0528134984',
                'email' => 'maiphuong00@gmail.com',
                'password' => bcrypt('12345678'),
                'status' => '1',
                'role' => '1',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10)
            ],
            [
                'username' => 'ThuyNgan',
                'fullname' => 'Nguyễn Thúy Ngân',
                'avatar' => 'image/anhav.jpg',
                'address' => 'Hoàn Kiếm, Hà Nội',
                'phone' => '0528135748',
                'email' => 'thuyngan@gmail.com',
                'password' => bcrypt('12345678'),
                'status' => '1',
                'role' => '1',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10)
            ],
            [
                'username' => 'HoangLong',
                'fullname' => 'Nguyễn Hoàng Long',
                'avatar' => 'image/anhav1.jpg',
                'address' => 'Bắc Từ Liêm, Hà Nội',
                'phone' => '0368291472',
                'email' => 'hoanglong@gmail.com',
                'password' => bcrypt('12345678'),
                'status' => '1',
                'role' => '1',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10)
            ],
            [
                'username' => 'ThanhVu',
                'fullname' => 'Vũ Xuân Thành',
                'avatar' => 'image/anhdd.jpg',
                'address' => 'Quỳnh Thụ, Thái Bình',
                'phone' => '0365478953',
                'email' => 'thanhvu18@gmail.com',
                'password' => bcrypt('123456789'),
                'status' => '1',
                'role' => '1',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10)
            ],
            [
                'username' => 'NganNguyen',
                'fullname' => 'Nguyễn Thị Ngân',
                'avatar' => 'image/anhdd.jpg',
                'address' => 'Hải Dương',
                'phone' => '0528134987',
                'email' => 'ngannguyen@gmail.com',
                'password' => bcrypt('123456789'),
                'status' => '1',
                'role' => '3',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10) 
            ],
            [
                'username' => 'MaiHuong',
                'fullname' => 'Nguyễn Mai Hương',
                'avatar' => 'image/anhdd.jpg',
                'address' => 'Bắc Giang',
                'phone' => '0363874921',
                'email' => 'maihuong@gmail.com',
                'password' => bcrypt('123456789'),
                'status' => '1',
                'role' => '3',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10) 
            ],
            [
                'username' => 'NgocLan',
                'fullname' => 'Trần Ngọc Lan',
                'avatar' => 'image/anhdd.jpg',
                'address' => 'Nam Định',
                'phone' => '0368749272',
                'email' => 'ngoclan289@gmail.com',
                'password' => bcrypt('123456789'),
                'status' => '1',
                'role' => '2',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10) 
            ],
            [
                'username' => 'TuongVi',
                'fullname' => 'Trần Ngọc Tường Vi',
                'avatar' => 'image/anhdd.jpg',
                'address' => 'Hải Dương',
                'phone' => '0368763972',
                'email' => 'tươngvi0909@gmail.com',
                'password' => bcrypt('123456789'),
                'status' => '1',
                'role' => '3',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10) 
            ],
            [
                'username' => 'NgocHuyen',
                'fullname' => 'Hoàng Thị Ngọc Huyền',
                'avatar' => 'image/anhdd.jpg',
                'address' => 'Hồ Chí Minh',
                'phone' => '0368786392',
                'email' => 'huyenhoang0309@gmail.com',
                'password' => bcrypt('123456789'),
                'status' => '1',
                'role' => '3',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10) 
            ],
            [
                'username' => 'NamLong',
                'fullname' => 'Hoàng Nam Long',
                'avatar' => 'image/anhdd.jpg',
                'address' => 'Hà Nội',
                'phone' => '0972364892',
                'email' => 'namlong@gmail.com',
                'password' => bcrypt('123456789'),
                'status' => '1',
                'role' => '3',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10) 
            ],
            [
                'username' => 'HoaiNam',
                'fullname' => 'Trương Hoài Nam',
                'avatar' => 'image/anhdd.jpg',
                'address' => 'Hà Nội',
                'phone' => '0363698473',
                'email' => 'hoainam@gmail.com',
                'password' => bcrypt('123456789'),
                'status' => '1',
                'role' => '3',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10) 
            ]
        ]);
    }
}
