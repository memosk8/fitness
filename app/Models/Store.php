<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $guarded = ['deleted_at'];

    protected $fillable = [
        'active'
    ];

    public function center(){
        return $this->belongsTo(Center::class);
    }

    public function warehouse(){
        return $this->hasOne(Warehouse::class);
    }
}
