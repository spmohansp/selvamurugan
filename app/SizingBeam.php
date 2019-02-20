<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webpatser\Uuid\Uuid;

class SizingBeam extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public $incrementing = false;
    protected static function boot(){
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::generate()->string;
        });
    }
}
