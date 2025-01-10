<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name'
    ];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'category', 'id');
    }

    // Define the relationship to products
    public function products()
    {
        return $this->hasMany(Products::class, 'category', 'id');
    }
}
