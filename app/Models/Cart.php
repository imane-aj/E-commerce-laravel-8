<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'phone',
        'price',
        'image',
        'quantity',
        'total',
        'product_name',
        'paid',
        'delivered',

        
    ];
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
