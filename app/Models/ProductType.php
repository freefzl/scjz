<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected  $fillable=['name','parent_id','img','abstract','sort'];

    public function parentName()
    {
        return $this->hasOne('App\Models\ProductType','id','parent_id');
    }
}
