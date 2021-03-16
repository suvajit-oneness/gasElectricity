<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    public function category()
    {
    	return $this->belongsTo('App\Model\BlogCategory','blogCategoryId','id');
    }

    public function posted()
    {
    	return $this->belongsTo('App\User','postedBy','id');
    }
}
