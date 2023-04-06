<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'status',
    ];
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
