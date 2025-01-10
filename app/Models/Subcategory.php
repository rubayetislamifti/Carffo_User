<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_category',
        'category',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }

    // Subcategory has many Products
    public function products()
    {
        return $this->hasMany(Products::class, 'sub_category', 'id');
    }
}
