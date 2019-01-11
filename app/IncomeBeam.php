<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IncomeBeam extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function Customer(){
    	return $this->hasMany(Customer::class,'id','customer_id');
    }

    public function SubCustomer(){
    	return $this->hasMany(SubCustomer::class,'id','sub_customer_id');
    } 
}
