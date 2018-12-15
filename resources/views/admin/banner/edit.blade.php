@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>更新banner</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('home.banner.update',['id'=>$banner->id])}}" method="post">
                {{ method_field('put') }}
                @include('admin.banner._form')
            </form>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.banner._js')
@endsection
