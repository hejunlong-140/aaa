<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
     //指定表名
    protected $table="admin";
    //指定主键
    protected $primaryKey='admin_id';
    //不自动添加时间
    public  $timestamps=true;
    //黑名单
    protected $guarded = [];
}
