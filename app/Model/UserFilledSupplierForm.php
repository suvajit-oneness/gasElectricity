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

    public function product()
    {
        return $this->belongsTo('App\Model\Product','productId','id');
    }

    public function rfq_details()
    {
        return $this->belongsTo('App\Model\Rfq','rfqId','id');
    }
}
