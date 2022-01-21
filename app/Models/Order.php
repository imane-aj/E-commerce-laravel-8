<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'quantity',
        'password',
        'product_name',
        'address',
        'phone',
        'price',
        'status',
    
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
