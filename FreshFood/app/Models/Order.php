<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'status',
        'address',
        'phone',
        'fullname',
        'note',
        'users_id',
    ];

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
