<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'description',
        'price',
        'stock',
        'image',
        'category',
        'sub_category',
        'previous_price',
        'discount',
        'size',
        'color'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }

    // Product belongs to a Subcategory
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'sub_category', 'id');
    }
}
