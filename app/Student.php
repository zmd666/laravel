<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //指定表名
    protected $table = 'student';
    //指定主键
    protected $primaryKey = 'id';

    /**
     * 设置日期时间格式
     *
     * @var string
     */
    public $dateFormat = 'U';

    /**
     * 需要被转换日期时间格式的字段
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];
}