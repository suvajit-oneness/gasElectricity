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
    public function feature()
    {
    	return $this->hasMany('App\Model\ProductFeature','product_id','id');
    }
    public function gas_data()
    {
    	return $this->hasOne('App\Model\GasData','product_id','id');
    }
    public function electricity_data()
    {
    	return $this->hasOne('App\Model\Electricitydata','product_id','id');
    }
}
