<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'product_color_id',
        'quantity',
        'price'
    ];
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function productColor()
    {
        return $this->belongsTo(ProductColor::class);
    }
}
