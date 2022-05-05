<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'customer_id',
        'quantity',
        'product_id',
        'create_date'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
