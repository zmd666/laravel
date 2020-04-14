<?php

namespace App\Models;

class Customer extends BaseModel
{
    //
    protected $table = 'user';
    protected $primaryKey = 'id';


    protected $fillable = [
        'name',
        'tel',
        'sex',
        'area'
    ];
    public $timestamps = true;
//    public function getDateFormat()
//    {
//        return time();
//    }
//    protected $hidden = ['updated_at', 'created_at', 'deleted_at'];
    public function address()
    {
        return $this->hasMany('App\Models\Address', 'user_id', 'id');
    }
}
