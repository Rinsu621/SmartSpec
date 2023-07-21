<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'name',
        'image',
        'price',
        'brand_id',
        'launch',
        'color',
        'processor',
        'ram',
        'storage',
        'display',
        'camera',
        'battery',
        'resistance',
    ];
    function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
}
