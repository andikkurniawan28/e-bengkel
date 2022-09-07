<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'supplier_id',
        'name',
        'price',
    ];

    public static function getAllProduct()
    {
        return self::join('categories', 'products.category_id', 'categories.id')
            ->join('suppliers', 'products.supplier_id', 'suppliers.id')
            ->select('suppliers.*', 'categories.name as category', 'suppliers.name as supplier')
            ->get();
    }
}
