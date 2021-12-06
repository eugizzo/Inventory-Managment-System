<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchasedQuantity',
        'soldQuantity',
        'remainingQuantity',
        'product_id',
        'branch_id',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
    public function branch()
    {
        return $this->belongsTo('App\Models\Branch', 'branch_id');
    }


    public function stockOut()
    {
        return $this->hasMany('App\Models\StockOut');
    }
}
