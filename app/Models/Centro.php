<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Centro extends Model
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
        'id','nombre',
        'calle','numExt',
        'numInt','col',
        'estado','ciudad','cp'
    ];

    public function tienda(){
        return $this->hasOne(Tienda::class);
    }
}
