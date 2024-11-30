<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "id_category",
        "name",
        "image",
        "price",
        "size",
        "quantity",
        "describe"
    ];
    protected $casts = [
        'image' => 'array',
    ];
}
