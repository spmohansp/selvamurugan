<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IncomeChemical extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function Unit(){
        return $this->belongsTo(Unit::class);
    }

    public function Chemical(){
        return $this->belongsTo(Chemical::class);
    }

}
