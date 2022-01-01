<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'active', 'nombre',
        'desc', 'precio',
        'costo'
    ];

    public function image(){
        return $this->hasOne(Image::class);
    }

    public function sale(){
        return $this->belongsToMany(Sale::class);
    }

    public function promo(){
        return $this->belongsTo(Promo::class);
    }

    public function warehouse(){
        return $this->belongsToMany(Warehouse::class);
    }

}
