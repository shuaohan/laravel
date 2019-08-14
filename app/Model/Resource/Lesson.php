<?php

namespace App\Model\Resource;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //不可以被批量赋值的
    protected $guarded =[];
    public function videos()
    {
        return $this->hasMany('App\Model\Resource\Video');
    }
}
