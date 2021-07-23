<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserFilledSupplierForm extends Model
{
    use SoftDeletes;

    public function company()
    {
        return $this->belongsTo('App\Model\Company','companyId','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','userId','id');
    }

    public function user_form_details()
    {
        return $this->hasMany('App\Model\UserFilledSupplierFormDetails','userFilledSupplierFormId','id');
    }
}
