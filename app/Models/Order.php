<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [

        'user_id',
        'total_price',
        'fname',
        'lname',
        'email',
        'phone',
        'adress1',
        'adress2',
        'city',
        'state',
        'country',
        'pincode',
        'status',
        'message',
        'tracking_no',
        
    ];

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
