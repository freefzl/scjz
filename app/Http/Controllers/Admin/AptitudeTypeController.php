<?php

namespace App\Http\Controllers\Admin;

use App\Models\AptitudeType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AptitudeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.aptitudeType.index');
    }

    public function data(Request $request)
    {
        $model = AptitudeType::query();

        $res = $model->orderBy('created_at','desc')->with(['parentName'])->paginate($request->get('limit',30))->toArray();
//        dd($res);
        $data = [
            'code' => 0,
            'msg'   => '正在请求中...',
            'count' => $res['total'],
            'data'  => $res['data']
        ];
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aptitudeTypes = $this->TypeTree();
        return view('admin.aptitudeType.create',compact('aptitudeTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        AptitudeType::create($data);
        return redirect(route('home.aptitudeType'))->with(['status'=>'添加成功']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aptitudeType = AptitudeType::find($id);
        $aptitudeTypes = $this->TypeTree();
        return view('admin.aptitudeType.edit',compact('aptitudeType','aptitudeTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $aptitudeType = AptitudeType::findOrFail($id);
        $data = $request->all();
        if ($aptitudeType->update($data)){
            return redirect(route('home.aptitudeType'))->with(['status'=>'更新成功']);
        }
        return redirect(route('home.aptitudeType'))->withErrors(['status'=>'系统错误']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->get('ids');
        if (empty($ids)){
            return response()->json(['code'=>1,'msg'=>'请选择删除项']);
        }
        foreach (AptitudeType::whereIn('id',$ids)->get() as $model){

            $model->delete();
        }
        return response()->json(['code'=>0,'msg'=>'删除成功']);
    }
}
