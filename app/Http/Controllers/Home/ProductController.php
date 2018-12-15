<?php

namespace App\Http\Controllers\Home;

use App\Models\Answer;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends BaseController
{
    public function index()
    {
        $site = Site::first()->toArray();
        $nav = $this->nav();
        $nav1 = $this->nav1();
        //分类
        $product_type = ProductType::where(['parent_id'=>0])->get()->toArray();
        foreach ($product_type as $k=>$value){
            $product_type[$k]['son'] = ProductType::where(['parent_id'=>$value['id']])->get()->toArray();
        }

        $product = Product::where(['type_id'=>$product_type[0]['son'][0]['id']])->get()->toArray();


        return view('home.product.index',compact('site','nav','nav1','product_type','product'));
    }

    public function getProduct(Request $request)
    {
        $product = Product::where(['type_id'=>$request->id])->get()->toArray();
        return response()->json(['code'=>0,'msg'=>'ok','data'=>$product]);

    }

    public function details($id)
    {
        $site = Site::first()->toArray();
        $nav = $this->nav();
        $nav1 = $this->nav1();
        $details = Product::where(['id'=>$id])->first()->toArray();

        $random = Product::where('id','<>',$id)->get()->toArray();
        if(count($random)<5){
            $random = Product::where('id','<>',$id)->limit(5)->get()->toArray();
        }else{
            $random = collect($random)->random(5)->toArray();
        }
        //问答
        $answer = Answer::orderBy('id','desc')->limit(4)->get()->toArray();

        return view('home.product.details',compact('details','site','nav1','nav','random','answer'));
    }
}
