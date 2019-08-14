<?php

namespace App\Model\Resource;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    //你需要先在模型上指定 fillable 
    //或 guarded 属性，因为所有的 Eloquent 模型在默认情况下都不能进行批量赋值。
    /**
     * 可以被批量赋值的属性。
     * $fillable 可以作为批量赋值的『白名单』，
     * 你也可以使用 $guarded 属性来实现。不同的是， 
     * $guarded 属性包含的是不允许被批量赋值的数组。 
     * 也就是说， $guarded 从功能上讲更像是一个『黑名单』。
     * 注意，在使用上，只能是 $fillable 或 $guarded 二选一。
     * @var array
     */
    
    //protected $fillable = ['name'];
    protected $guarded =[];
}
