<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'user_id',
        'product_id',
        'payment_type_id',
        'total',
        'status',
        'date',
        'delivery',
        'price_delivery',
        'price_delivery',
        'price_tax',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }


    public function payment_type()
    {
        return $this->belongsTo(PaymentType::class,'payment_type_id');
    }

}
