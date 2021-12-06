<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'company_id',
        'status',
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



    public function stockOut()
    {
        return $this->hasMany('App\Models\StockOut');
    }
    public function stock()
    {
        return $this->hasMany('App\Models\Stock');
    }

    public function stockIn()
    {
        return $this->hasMany('App\Models\StockIn');
    }
}
