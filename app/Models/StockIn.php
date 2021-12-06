<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch_id',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function branch()
    {
        return $this->belongsTo('App\Models\Branch', 'branch_id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('purchasedQuantity', 'unityPrice', 'supplier')->withTimestamps();
    }
}
