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
}