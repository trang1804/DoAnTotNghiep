<?php

namespace App\Common;

class Constants{
    const DISABLE = 2;
    const ENABLED = 1;
    const DISABLE_ACCOUNT = 0;
    const ENABLED_ACCOUNT = 1;
    
    const STATUS_CUSTOMER = [
        self::DISABLE => 'Ngưng hoạt động',
        self::ENABLED => 'Đang hoạt động',
    ];
    const STATUS_PRODUCTS = [
        self::DISABLE_ACCOUNT => 'Ngưng hoạt động',
        self::ENABLED_ACCOUNT => 'Đang hoạt động',
    ];
    const STATUS_BLOGS = [
        self::DISABLE_ACCOUNT => 'Chưa duyệt bài viết',
        self::ENABLED_ACCOUNT => 'Đã duyệt bài viết',
    ];
    const CUSTOMER = 0;
    const ADMIN = 1;
    const ACCOUNTANT = 2;
    const ROLE = [
        self::ADMIN => 'Quản lí cấp cao',
        self::ACCOUNTANT => 'Kế toán',
        self::CUSTOMER => 'Người dùng',
    ];

}