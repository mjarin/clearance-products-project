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
           'customer_name',
           'email',
           'phone',
           'shipping_address',
           'city',
           'state',
           'pincode',
           'country',
           'advance_payment',
           'total_price',
           'delivery_charge',
            'grand_total',
            'order_date',
            'delivery_date',
           'payment_mode',
           'payment_id',
           'delivery_status',
           'transaction_id',
           'currency',
           'tracking_no'
    ];

    public function OrderItems(){

      return $this->hasMany(OrderItem::class,'order_id','id');
  }

}
