<?php

namespace App\Http\Controllers\Home;

use App\Models\Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    //顶部导航
    public function nav()
    {
       return $nav = Navigation::where(['type'=>1])->orderBy('sort','desc')->get()->toArray();
    }

    //尾部导航
    public function nav1()
    {
        return $nav = Navigation::where(['type'=>2])->orderBy('sort','desc')->get()->toArray();
    }
}
