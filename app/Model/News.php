<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
     //指定表名
    protected $table="news";
    //指定主键
    protected $primaryKey='n_id';
    //不自动添加时间
    public  $timestamps=true;
    //黑名单
    protected $guarded = [];
}
