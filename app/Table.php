<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = 'table1';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public function getDateFormat()
    {
        return time();
    }
    protected $fillable = ['name', 'age'];
    protected $hidden = ['updated_at', 'created_at', 'deleted_at'];
}