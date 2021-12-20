<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'producto','stock','centro',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
/*     protected $hidden = [
        'password',
        'remember_token',
    ]; */

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
/*     protected $casts = [
        'email_verified_at' => 'datetime',
    ]; */
}
