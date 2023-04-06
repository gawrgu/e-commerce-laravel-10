<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status',
    ];
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function relatedProducts()
    {
        return $this->hasMany(Product::class)->latest()->take(8);
    }
    public function brands()
    {
        return $this->hasMany(Brand::class)->where('status', 0);
    }
}
