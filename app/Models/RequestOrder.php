<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestOrder extends Model
{
    use HasFactory;
    protected  $fillable = [
        'client_id',
        'driver_id',
        'sender_name',
        'sender_phone',
        'sender_address',
        'time_request',
        'receiver_name',
        'receiver_phone',
        'receiver_address',
        'total_price',
        'order_code',
        'status',
    ];


    public function client()
    {
        return $this->belongsTo(User::class,'client_id');
    }


    public function driver()
    {
        return $this->belongsTo(User::class,'driver_id');
    }

}
