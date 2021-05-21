<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductFeature extends Model
{
    use SoftDeletes;

    public function product()
    {
    	return $this->belongsTo('App\Model\Product','product_id','id');
    }
}
