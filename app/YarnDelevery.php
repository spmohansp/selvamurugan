<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class YarnDelevery extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function Customers(){
        return $this->hasMany(Customer::class,'id','customer_id');
    }

    public function Customer(){
        return $this->belongsTo(Customer::class);
    }

    public function SubCustomers(){
        return $this->hasMany(SubCustomer::class,'id','sub_customer_id');
    }

    public function SubCustomer(){
        return $this->belongsTo(SubCustomer::class);
    }

    public function Companies(){
        return $this->hasMany(Customer::class,'id','company_id');
    }
}
