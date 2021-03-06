@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>添加流程</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('home.process.store')}}" method="post">
                @include('admin.process._form')
            </form>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.process._js')
@endsection
