<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['url'];

    public product(){
        return $this->belongsTo(Product::class);
    }
}
