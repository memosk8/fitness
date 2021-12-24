<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
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
        'fecha','user_id',
        'producto','total',
        'socio_id'
    ];

    public function productos(){
        return $this->hasMany(Producto::class);
    } 

    public function usuario(){
        return $this->belongsTo(User::class);
    }

    public function socio(){
        return $this->hasOne(Socio::class);
    }
}
