<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'cat_name',
        'quantity',
        'remise',
        'from',
        'recommended',
        'reviews',
        'brand_name'
        
    ];
    public function category() {
        return $this->belongsTo(Category::class, 'cat_name');
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }
    
}
