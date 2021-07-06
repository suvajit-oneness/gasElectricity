<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupplierForm extends Model
{
    use SoftDeletes;

    public function input_type()
    {
        return $this->belongsTo('App\Model\FormInput','formInputId','id');
    }
}
