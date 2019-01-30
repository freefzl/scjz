<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends BaseController
{
    public function index()
    {
        $site = Site::first()->toArray();
        $nav = $this->nav();
        $nav1 = $this->nav1();

        $new = Article::where(['type'=>'new'])->orderBy('created_at','desc')->paginate(1);
        $news = Article::where(['type'=>'new'])->orderBy('created_at','desc')->limit(10)->get();
        $business = Article::where(['type'=>'business'])->orderBy('created_at','desc')->limit(10)->get();

        return view('home.article.index',compact('new','news','business','site','nav','nav1'));
    }

    public function content($id)
    {
        $site = Site::first()->toArray();
        $nav = $this->nav();
        $nav1 = $this->nav1();

        $new = Article::findOrFail($id);

        return view('home.article.content',compact('new','site','nav','nav1'));
    }

    public function business()
    {
        $site = Site::first()->toArray();
        $nav = $this->nav();
        $nav1 = $this->nav1();

        $business = Article::where(['type'=>'business'])->orderBy('created_at','desc')->paginate(1);
        $busine = Article::where(['type'=>'business'])->orderBy('created_at','desc')->limit(10)->get();
        $new = Article::where(['type'=>'new'])->orderBy('created_at','desc')->limit(10)->get();

        return view('home.article.business',compact('new','busine','business','site','nav','nav1'));
    }

    public function b_content($id)
    {
        $site = Site::first()->toArray();
        $nav = $this->nav();
        $nav1 = $this->nav1();

        $business = Article::findOrFail($id);

        return view('home.article.b_content',compact('business','site','nav','nav1'));
    }
}
