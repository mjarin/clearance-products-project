<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table='categories';
    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'status',
        'popular',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    public function products()
    {
        return $this->hasMany(Product::class,'cate_id','id');
        // return $this->hasMany(OrderDetails::class);
    }

}
