<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}
