<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Referral extends Model
{
    use SoftDeletes;
    
    protected $hidden = [
        'deleted_at', 'updated_at','created_at',
    ];
}
