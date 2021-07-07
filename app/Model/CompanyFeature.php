<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyFeature extends Model
{
    use SoftDeletes;

    public function company()
    {
        return $this->belongsTo('App\Model\Company','companyId','id');
    }
}
