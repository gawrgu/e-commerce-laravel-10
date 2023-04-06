<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $fillable = [
        'website_name',
        'website_url',
        'page_title',
        'meta_keyword',
        'meta_description',
        'address',
        'phone1',
        'phone2',
        'email1',
        'email2',
        'facebook',
        'twitter',
        'instagram',
        'youtube'
    ];
    use HasFactory;
}