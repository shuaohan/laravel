<?php

namespace App\Model\Resource;

use Illuminate\Database\Eloquent\Model;

class Sound extends Model
{
    //
    protected $guarded=[];
    public function point()
    {
        return $this->hasMany('App\Model\Resource\Point','article_id');
    }
}
