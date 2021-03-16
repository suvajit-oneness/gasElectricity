<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use SoftDeletes;

    public function blogs()
    {
    	return $this->hasMany('App\Model\Blog','blogCategoryId','id');
    }
}
