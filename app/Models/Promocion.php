<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'producto','porcentaje',
        'fecha_inicio','fecha_fin',
    ];

    public function producto(){
        return $this->hasOne(Producto::class);
    }
}
