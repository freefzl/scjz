<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['img','title','abstract','introduce','security','type_id','tag','commitment'];

    public function typeName()
    {
        return $this->hasOne('App\Models\ProductType', 'id', 'type_id');
    }
}
