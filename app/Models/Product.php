<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nama', 'tipe', 'deskripsi', 'harga', 'qty', 'slug'
    ];

    protected $hidden = [];

    public function galleries()
    {
        return $this->hasMany(Galery::class, 'product_id');
    }

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'product_id');
    }
}
