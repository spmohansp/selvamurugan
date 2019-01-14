<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warping extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function Customers(){
        return $this->hasMany(Customer::class,'id','customer_id');
    }

    public function Customer(){
        return $this->hasOne(Customer::class,'id','customer_id');
    }

    public function SubCustomers(){
        return $this->hasMany(SubCustomer::class,'id','sub_customer_id');
    }

    public function SubCustomer(){
        return $this->BelongsTo(SubCustomer::class);
    }
}
