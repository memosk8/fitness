<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Socio extends Model
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
        'cuota','nombre',
        'apellido_paterno','apellido_materno',
        'calle','num_int','num_ext',
        'ciudad','estado','cp'
    ];

    public function compra(){
        return $this->hasMany(Venta::class);
    }
    
}
