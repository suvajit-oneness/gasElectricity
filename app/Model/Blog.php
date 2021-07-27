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

    public function likes()
    {
    	return $this->hasMany('App\Model\BlogLike','blogId','id')->orderBy('id','DESC');
    }

    public function comment()
    {
    	return $this->hasMany('App\Model\BlogComment','blogId','id')->orderBy('id','DESC');
    }
}
