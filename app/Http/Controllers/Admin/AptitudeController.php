<?php

namespace App\Http\Controllers\Admin;

use App\Models\Aptitude;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AptitudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.aptitude.index');
    }

    public function data(Request $request)
    {
        $model = Aptitude::query();

        $res = $model->orderBy('created_at','desc')->with(['typeName'])->paginate($request->get('limit',30))->toArray();
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
        return view('admin.aptitude.create',compact('aptitudeTypes'));
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
        Aptitude::create($data);
        return redirect(route('home.aptitude'))->with(['status'=>'添加成功']);
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
        $aptitude = Aptitude::find($id);
        $aptitudeTypes = $this->TypeTree();
        return view('admin.aptitude.edit',compact('aptitude','aptitudeTypes'));
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
        $aptitude = Aptitude::findOrFail($id);
        $data = $request->all();
        if ($aptitude->update($data)){
            return redirect(route('home.aptitude'))->with(['status'=>'更新成功']);
        }
        return redirect(route('home.aptitude'))->withErrors(['status'=>'系统错误']);
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
        foreach (Aptitude::whereIn('id',$ids)->get() as $model){

            $model->delete();
        }
        return response()->json(['code'=>0,'msg'=>'删除成功']);
    }
}
