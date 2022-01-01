<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'active', 'cuota',
        'nombre', 'apellidoPaterno',
        'apellidoMaterno', 'calle',
        'numInt', 'numExt',
        'ciudad','estado','cp'
    ];

    public function sale(){
        return $this->hasMany(Sale::class);
    }

}
