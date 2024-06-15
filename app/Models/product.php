<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    //tinh nang tim kiem sp 
    protected $fillable = [
        'name', 'material', 'price_nomal', 'price_sale', 'description', 'content', 'image', 'images'
    ];
}
