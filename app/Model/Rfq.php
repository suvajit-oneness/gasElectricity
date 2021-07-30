<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rfq extends Model
{
    use SoftDeletes;

    protected $hidden = [
        'deleted_at', 'updated_at','created_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','userId','id');
    }

    public function contacted_by()
    {
        return $this->belongsTo('App\User','resolved_by','id');
    }
}
