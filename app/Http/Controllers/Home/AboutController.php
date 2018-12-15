<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use App\Models\Company;
use App\Models\Concept;
use App\Models\Course;
use App\Models\Job;
use App\Models\Mien;
use App\Models\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends BaseController
{
    public function index()
    {
        $site = Site::first()->toArray();
        $nav = $this->nav();
        $nav1 = $this->nav1();

        //公司介绍
        $company = Company::first()->toArray();
        $concept = Concept::first()->toArray();
        $course = Course::first()->toArray();
        $mien = Mien::first()->toArray();
        $job = Job::first()->toArray();
        $about = About::first()->toArray();
//        dd($site);
        return view('home.about.index',compact('site','nav1','nav','company','concept','course','mien','job','about'));
    }
}
