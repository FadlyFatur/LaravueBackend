<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'trans_id', 'name', 'email', 'number', 'address', 'trans_total', 'trans_status'
    ];

    protected $hidden = [];

    public function detail()
    {
        return $this->hasMany(TransactionDetail::class, 'trans_id');
    }
}
