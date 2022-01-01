<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Center extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['deleted_at'];

    protected $fillable = [
        'active', 'nombre',
        'calle', 'numExt',
        'numInt', 'col',
        'estado', 'ciudad',
        'cp'
    ];

    public function store(){
        return $this->hasOne(Store::class);
    }

    public function user(){
        return $this->hasMany(User::class);
    }
}
