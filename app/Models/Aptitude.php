<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aptitude extends Model
{
    protected $fillable=['type_id','name','url'];

    public function typeName()
    {
        return $this->hasOne('App\Models\AptitudeType', 'id', 'type_id');
    }
}
