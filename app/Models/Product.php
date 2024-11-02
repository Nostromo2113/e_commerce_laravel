<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function technicalRequirements()
    {
        return $this->hasOne(TechnicalRequirement::class, 'product_id');
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_products', 'product_id', 'genre_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_products', 'product_id', 'order_id');
    }
}
