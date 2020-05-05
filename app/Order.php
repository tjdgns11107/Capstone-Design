<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'buy_user', 'product_id' , 'order_date', 'send_user', 'send_address', 'payment',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'buy_user');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
