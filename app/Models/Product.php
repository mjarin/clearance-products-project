<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'image',
        'cate_id',
        'original_price',
        'selling_price',
        'qty',
        'tax',
        'slug',
        'status',
        'trending',
        'small_description',
        'description',
        'meta_title',
        'meta_keyword',
        'meta_description'
    ];

    // Relashion between 2 table
    public function category()
    {
        return $this->belongsTo(Category::class,'cate_id','id');
    }
}
