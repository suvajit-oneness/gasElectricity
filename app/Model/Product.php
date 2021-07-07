<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    public function company()
    {
    	return $this->belongsTo('App\Model\Company','company_id','id');
    }

    public function product_gas()
    {
    	return $this->hasOne('App\Model\ProductGas','product_id','id');
    }

    public function product_electricty()
    {
    	return $this->hasOne('App\Model\ProductElectricity','product_id','id');
    }

    public function product_rating()
    {
        return $this->hasMany('App\Model\ProductRating','product_id','id');
    }

    public function product_momentum()
    {
        return $this->hasMany('App\Model\ProductMomentum','productId','id');
    }

    public function author()
    {
        return $this->belongsTo('App\User','created_by','id');
    }
}
