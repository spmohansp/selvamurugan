<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sizing extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function Warping(){
        return $this->belongsTo(Warping::class);
    }

    public function Customer(){
        return $this->hasOne(Customer::class);
    }
}
