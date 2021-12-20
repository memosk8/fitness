<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nombre','desc','precio','costo'
    ];

    public function image() {
        return $this->hasOne(Imagen::class);
    }

    public function ventas() {
        return $this->belongsToMany(Venta::class);
    }

    public function almacen(){
        return $this->belongsToMany(Almacen::class);
    }

    public function promocion(){
        return $this->belongsTo(Promocion::class);
    }
}

