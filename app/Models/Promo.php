<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
        'status', 'center_name', 'product_name',
        'price', 'month'
    ];

    public function product(){
        return $this->hasOne(Product::class);
    }

    public function center(){
        return $this->hasOne(Center::class);
    }

}
