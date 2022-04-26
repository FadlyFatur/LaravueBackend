<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'product_id', 'foto', 'is_default'
    ];

    protected $hidden = [];

    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function getFotoAttribute($value)
    {
        return url('/storage/' . $value);
    }
}
