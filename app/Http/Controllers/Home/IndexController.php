<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\MessageRequest;
use App\Models\Answer;
use App\Models\Banner;
use App\Models\Institution;
use App\Models\Konw;
use App\Models\Message;
use App\Models\Process;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Rolling;
use App\Models\Site;
use Illuminate\Http\Request;

class IndexController extends BaseController
{

    public function index()
    {
        $site = Site::first()->toArray();
        $nav = $this->nav();
        $nav1 = $this->nav1();
        //幻灯片
        $banner = Banner::where(['type'=>1])->orderBy('id','desc')->limit(4)->get()->toArray();
        $banner1 = Banner::where(['type'=>2])->limit(1)->first();
        //流程化
        $process = Process::orderBy('sort','desc')->orderBy('id','asc')->limit(5)->get()->toArray();
        //知道
        $answer = Answer::limit(8)->get()->toArray();
        //滚动图
        $rolling = Rolling::all()->toArray();
        //合作机构
        $institution = Institution::all()->toArray();

        //产品
        $type = ProductType::where(['parent_id'=>0])->orderBy('sort','desc')->limit(4)->get()->toArray();
        foreach ($type as $k=>$item){
            $type[$k]['son'] = ProductType::where(['parent_id'=>$item['id']])->limit(3)->get()->toArray();
            $son_type = $type[$k]['son'];
            foreach ($son_type as $key=>$value){
                $type[$k]['son'][$key]['product'] = Product::where(['type_id'=>$value['id']])->limit(5)->get()->toArray();
            }
        }
//        $products = Product::with([])->get()->toArray();
//        dump($type);

        return view('home.index.index',compact('site','nav','banner','process','answer','rolling','institution','nav1','banner1','type'));
    }

    public function getMobile(MessageRequest $request)
    {


        $data = $request->all();

        $is = Message::where(['phone'=>$data['phone']])->get();
//        dd(count($is));
        if(!count($is)){
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
