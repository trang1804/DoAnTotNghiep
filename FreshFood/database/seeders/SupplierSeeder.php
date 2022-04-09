<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            [
                'nameSupplier' => 'Công ty TNHH thực phẩm Hoàng Đông',
                'address' => 'Phòng 201, Nhà C6 Mai Động, Quận Hoàng Mai, Hà Nội',
                'phone' => '(04) 22182181 – 024. 2217 1661',
            ],
            [
                'nameSupplier' => 'Công Ty Exp Việt Nam',
                'address' => 'Phòng 302 tòa nhà Thông Tấn, Xuân Phương, quận, Nam Từ Liêm, Hà Nội ',
                'phone' => '0966 484 808',
            ],
            [
                'nameSupplier' => 'Doanh Nghiệp Tư Nhân Ngọc Cường',
                'address' => 'Tổ 3 Vọng La, Vọng La, Đông Anh, Hà Nội',
                'phone' => '0989891764',
            ],
            [
                'nameSupplier' => 'Công Ty FamFood',
                'address' => 'TT10 – 39, KĐT Mới Văn Phú, P. Phú La, Q. Hà Đông, Hà Nội',
                'phone' => '0327 003003',
            ],
            [
                'nameSupplier' => 'Công Ty Vifoodshop',
                'address' => '54 HH03D, Khu Đô Thị Thanh Hà – Mường Thanh, Cự Khê, Hà Đông, Hà Nội',
                'phone' => '0989333999',
            ]
        ]);
    }
}
