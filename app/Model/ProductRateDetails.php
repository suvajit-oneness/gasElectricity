<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductRateDetails extends Model
{
    use SoftDeletes;

    public function product()
    {
        return $this->belongsTo('App\Model\Product','productId','id');
    }
}
