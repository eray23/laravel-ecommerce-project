<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, softDeletes;

    protected $primaryKey = "product_id";

    protected $fillable = [
      "product_id",
        "category_id",
        "name",
        "price",
        "old_price",
        "lead",
        "description",
        "slug",
        "is_active",
    ];
}
