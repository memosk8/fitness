<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tienda extends Model
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
        'centro', 'almacen'
    ];

    public function centro(){
        return $this->belongsTo(Centro::class);
    }

    public function almacen(){
        return $this->hasOne(Almacen::class);
    }
}
