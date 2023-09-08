<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnOrder extends Model
{
    use HasFactory;

    protected $table = 'return_orders';
    protected $fillable = [
        'order_id',
        'customer_name',
        'phone',
        'return_reason',
        'return_request_date',
    ];

}
