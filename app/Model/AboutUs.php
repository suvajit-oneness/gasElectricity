<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutUs extends Model
{
    use SoftDeletes;

    function whychoose()
    {
    	return $this->hasMany('App\Model\WhyChooseUs','aboutus_id','id');
    }
}
