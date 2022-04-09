<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'namePro' => 'Cà chua',
                'image' => 'https://webmaudep.com/demo/thucpham/tp01/images/product-5.jpg',
                'quantity' => '30',
                'price' => '40000',
                'status' => '1',
                'category_id' => '1',
                'supplier_id' => '1'
            ],
            [
                'namePro' => 'Súp lơ',
                'image' => 'https://webmaudep.com/demo/thucpham/tp01/images/product-6.jpg',
                'quantity' => '25',
                'price' => '18000',
                'status' => '1',
                'category_id' => '2',
                'supplier_id' => '1'
            ],
            [
                'namePro' => 'Cà rốt',
                'image' => 'https://webmaudep.com/demo/thucpham/tp01/images/product-7.jpg',
                'quantity' => '24',
                'price' => '38000',
                'status' => '1',
                'category_id' => '1',
                'supplier_id' => '2'
            ],
            [
                'namePro' => 'Ớt chuông',
                'image' => 'https://webmaudep.com/demo/thucpham/tp01/images/product-1.jpg',
                'quantity' => '34',
                'price' => '48000',
                'status' => '1',
                'category_id' => '1',
                'supplier_id' => '3'
            ],
            [
                'namePro' => 'Chanh không hạt',
                'image' => 'http://mauweb.monamedia.net/vuonrau/wp-content/uploads/2019/05/p12.jpg',
                'quantity' => '15',
                'price' => '56000',
                'status' => '1',
                'category_id' => '1',
                'supplier_id' => '4'
            ],
            [
                'namePro' => 'Nho Mỹ',
                'image' => 'http://mauweb.monamedia.net/vuonrau/wp-content/uploads/2019/05/p16.jpg',
                'quantity' => '30',
                'price' => '165000',
                'status' => '1',
                'category_id' => '4',
                'supplier_id' => '3'
            ],
            [
                'namePro' => 'Dâu tây Đà Lạt',
                'image' => 'http://mauweb.monamedia.net/vuonrau/wp-content/uploads/2019/05/p11.jpg',
                'quantity' => '25',
                'price' => '220000',
                'status' => '1',
                'category_id' => '4',
                'supplier_id' => '2'
            ],
            [
                'namePro' => 'Hành tím',
                'image' => 'https://demo2wpopal.b-cdn.net/freshio/wp-content/uploads/2020/08/5-450x420.jpg',
                'quantity' => '27',
                'price' => '55000',
                'status' => '1',
                'category_id' => '1',
                'supplier_id' => '2'
            ],
            [
                'namePro' => 'Dưa hấu',
                'image' => 'https://demo2wpopal.b-cdn.net/freshio/wp-content/uploads/2020/08/8-450x420.jpg',
                'quantity' => '22',
                'price' => '15000',
                'status' => '1',
                'category_id' => '4',
                'supplier_id' => '2'
            ],
            [
                'namePro' => 'Cam',
                'image' => 'https://demo2wpopal.b-cdn.net/freshio/wp-content/uploads/2020/08/1-450x420.jpg',
                'quantity' => '20',
                'price' => '25000',
                'status' => '1',
                'category_id' => '4',
                'supplier_id' => '2'
            ],
            [
                'namePro' => 'Khoai tây',
                'image' => 'https://demo2wpopal.b-cdn.net/freshio/wp-content/uploads/2020/08/6-450x420.jpg',
                'quantity' => '20',
                'price' => '20000',
                'status' => '1',
                'category_id' => '1',
                'supplier_id' => '2'
            ],
            [
                'namePro' => 'Táo nhập khẩu',
                'image' => 'https://demo2wpopal.b-cdn.net/freshio/wp-content/uploads/2020/08/2-450x420.jpg',
                'quantity' => '20',
                'price' => '65000',
                'status' => '1',
                'category_id' => '4',
                'supplier_id' => '2'
            ],
            [
                'namePro' => 'Thịt lợn',
                'image' => 'https://demo2wpopal.b-cdn.net/freshio/wp-content/uploads/2020/08/19.jpg',
                'quantity' => '25',
                'price' => '120000',
                'status' => '1',
                'category_id' => '3',
                'supplier_id' => '5'
            ],
            [
                'namePro' => 'Xương sườn',
                'image' => 'https://demo2wpopal.b-cdn.net/freshio/wp-content/uploads/2020/08/16.jpg',
                'quantity' => '25',
                'price' => '175000',
                'status' => '1',
                'category_id' => '3',
                'supplier_id' => '5'
            ],
            [
                'namePro' => 'Thịt gà',
                'image' => 'https://demo2wpopal.b-cdn.net/freshio/wp-content/uploads/2020/08/18.jpg',
                'quantity' => '15',
                'price' => '75000',
                'status' => '1',
                'category_id' => '3',
                'supplier_id' => '4'
            ],
            [
                'namePro' => 'Rau cải thảo',
                'image' => 'http://demo1.cloodo.com/html/oars/img/products/product-10.jpg',
                'quantity' => '20',
                'price' => '20000',
                'status' => '1',
                'category_id' => '2',
                'supplier_id' => '3'
            ],
            [
                'namePro' => 'Qủa Kiwi',
                'image' => 'https://cdn.shopify.com/s/files/1/0259/4331/0388/products/24_425x.jpg?v=1566788964',
                'quantity' => '20',
                'price' => '240000',
                'status' => '1',
                'category_id' => '1',
                'supplier_id' => '5'
            ],
            [
                'namePro' => 'Cà tím',
                'image' => 'https://cdn.shopify.com/s/files/1/0259/4331/0388/products/66_425x.jpg?v=1566789002',
                'quantity' => '15',
                'price' => '35000',
                'status' => '1',
                'category_id' => '1',
                'supplier_id' => '4'
            ],
            // [
            //     'namePro' => '',
            //     'image' => '',
            //     'quantity' => '',
            //     'price' => '',
            //     'status' => '',
            //     'category_id' => '',
            //     'supplier_id' => '',
            //     'sale_id' => ''
            // ],
            // [
            //     'namePro' => '',
            //     'image' => '',
            //     'quantity' => '',
            //     'price' => '',
            //     'status' => '',
            //     'category_id' => '',
            //     'supplier_id' => '',
            //     'sale_id' => ''
            // ]
        ]);
    }
}
