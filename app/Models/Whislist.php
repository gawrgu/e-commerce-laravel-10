<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whislist extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
    ];
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
