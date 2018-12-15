@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>添加滚动图</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('home.rolling.store')}}" method="post">
                @include('admin.rolling._form')
            </form>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.rolling._js')
@endsection
