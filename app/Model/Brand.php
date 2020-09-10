<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //指定表名
    protected $table="brand";
    //指定主键
    protected $primaryKey='brand_id';
    //黑名单
    protected $guarded = [];
}
