<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'product_color_id',
        'quantity',
    ];

    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Product::class)->where('status', 0);
    }
    public function productColor()
    {
        return $this->belongsTo(ProductColor::class);
    }
}
