<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AptitudeType extends Model
{
    protected $fillable=['name','parent_id','img','abstract'];

    public function parentName()
    {
        return $this->hasOne('App\Models\AptitudeType','id','parent_id');
    }
}
