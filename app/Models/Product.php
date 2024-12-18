<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'image',
        'description',
        'price',
        'discount',
        'stock',
        'delete_status',
    ];

    // app/Models/Product.php
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

}
