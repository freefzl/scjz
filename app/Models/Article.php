<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=['type','title','keywords','description','content','click','thumb','editor'];
}
