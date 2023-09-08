<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = [
        'order_id',
        'prod_id',
        'qty',
        'unit_price'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'prod_id','id');
    }
}
