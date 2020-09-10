<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //指定表名
    protected $table="type";
    //指定主键
    protected $primaryKey='t_id';
    //不自动添加时间
    public  $timestamps=true;
    //黑名单
    protected $guarded = [];
}
