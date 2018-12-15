<?php

namespace App\Http\Controllers\Wap;

use App\Http\Requests\MessageRequest;
use App\Models\Answer;
use App\Models\Banner;
use App\Models\Message;
use App\Models\Process;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $site = Site::first()->toArray();

        $banner = Banner::where(['type'=>1])->orderBy('id','desc')->limit(4)->get()->toArray();

        $answer = Answer::orderBy('id','desc')->limit(2)->get()->toArray();

        $process = Process::orderBy('sort','desc')->orderBy('id','asc')->limit(5)->get()->toArray();

        $type = ProductType::where(['parent_id'=>0])->orderBy('sort','desc')->limit(4)->get()->toArray();

        $product = Product::orderBy('id','desc')->limit(8)->get()->toArray();

        return view('wap.index.index',compact('site','banner','answer','process','type','product'));
    }


    public function classification()
    {
        //产品
        $site = Site::first()->toArray();
        $type = ProductType::where(['parent_id'=>0])->orderBy('sort','desc')->limit(4)->get()->toArray();
        foreach ($type as $k=>$item){
            $type[$k]['son'] = ProductType::where(['parent_id'=>$item['id']])->limit(3)->get()->toArray();
            $son_type = $type[$k]['son'];
            foreach ($son_type as $key=>$value){
                $type[$k]['son'][$key]['product'] = Product::where(['type_id'=>$value['id']])->get()->toArray();
            }
        }
//        dd($type);
        return view('wap.index.menu',compact('type','site'));
    }


    public function product($id)
    {
        $site = Site::first()->toArray();


        $list = Product::where(['type_id'=>$id])->get()->toArray();

        return view('wap.index.list',compact('site','list','id'));
    }

    public function details($id)
    {
        $site = Site::first()->toArray();

        $product = Product::where(['id'=>$id])->first()->toArray();

        $answer = Answer::orderBy('id','desc')->limit(4)->get()->toArray();
        return view('wap.index.details',compact('site','product','answer'));
    }


    public function search(Request $request)
    {

        $product = Product::where('title','like','%'.$request->key.'%')->where(['type_id'=>$request->type_id])->get()->toArray();

        return response()->json(['code'=>0,'msg'=>'ok','data'=>$product]);
    }

    public function postData(MessageRequest $request)
    {
        $data = $request->all();

        $is = Message::where(['phone'=>$data['phone']])->count();

        if(!$is){
            $res = Message::create($data);
        }else{
            return response()->json(['code'=>1,'msg'=>'已经申请了！']);
        }


        if($res){
            return response()->json(['code'=>0,'msg'=>'提交成功']);
        }else{
            return response()->json(['code'=>1,'msg'=>'系统错误']);
        }
    }
}
