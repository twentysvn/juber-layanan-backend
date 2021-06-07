<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodishProduct extends Model
{
    protected $table = 'foodish_produk';
    protected $guarded = [];
    use HasFactory;
}
