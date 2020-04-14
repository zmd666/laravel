<?php

namespace App\Models;

use App\Handlers\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    // 软删除
    use SoftDeletes;

    // 设置日期时间格式
    Protected $dateFormat = 'U';

    /**
     * 需要被转换日期时间的属性
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * 为数组 / JSON 序列化准备日期。
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i:s');
    }
}
