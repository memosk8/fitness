<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}
