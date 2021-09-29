<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProductEnrolled extends Model
{
    use SoftDeletes;

    public function product_data()
    {
        return $this->belongsTo('App\Model\Product','productId','id');
    }

    public function rfq_data()
    {
        return $this->belongsTo('App\Model\Rfq','rfqId','id');
    }
}
