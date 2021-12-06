<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'purchasedQuantity',
        'soldQuantity',
        'remainingQuantity',
        'company_id',
        'category_id',
        'brand_id',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }

    public function stock()
    {
        return $this->hasMany('App\Models\Stock');
    }
    public function stockIn()
    {
        return $this->belongsToMany(StockIn::class)->withPivot('purchasedQuantity', 'unityPrice', 'supplier')->withTimestamps();
    }
    public function stockOut()
    {
        return $this->belongsToMany(StockOut::class)->withPivot('soldQuantity', 'unityPrice')->withTimestamps();
    }
}
