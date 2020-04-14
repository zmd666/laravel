<?php

namespace App\Models;

class Address extends BaseModel
{
    protected $fillable = [
        'user_id',
        'addr',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'user_id', 'id');
    }
}
