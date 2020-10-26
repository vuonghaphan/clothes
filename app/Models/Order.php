<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id', 'name' , 'phone', 'address', 'totalMoney', 'message', 'created_at', 'updated_at'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderDetails(){
        return $this->hasMany(orderDetail::class);
    }

    public function product(){
        return $this->belongsToMany(Product::class, 'Order_details');
    }
}
