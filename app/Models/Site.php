<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'sites';
    protected $fillable=['title','keywords','description','hello','weixin','about','service','logo','mobile','number1','number2','number3','title1','title1_1','title1_2','title2','title2_1','title3','title3_1','title3_2','title4','copyright','statistical_code','leyu','leyu_url'];
}
