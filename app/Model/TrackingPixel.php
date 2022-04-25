<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrackingPixel extends Model
{
    use SoftDeletes;

    protected $hidden = [
        'user_id', 'seller_id', 'ip', 'page', 'time', 'utm', 'button_id', 'x_axis', 'y_axis', 'deleted_at', 'created_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo('App\Model\Company', 'seller_id', 'id');
    }
}