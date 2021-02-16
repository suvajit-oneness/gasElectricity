<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WhyChooseUs extends Model
{
    use SoftDeletes;

    function aboutus()
    {
    	return $this->belongsTo('App\Model\AboutUs','aboutus_id','id');
    }
}
