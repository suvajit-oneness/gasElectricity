<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupplierPincode extends Model
{
    use SoftDeletes;
    
    protected $hidden = ['created_at','deleted_at','updated_at'];

    public function state()
    {
        return $this->belongsTo('App\Model\State','stateId','id');
    }
}
