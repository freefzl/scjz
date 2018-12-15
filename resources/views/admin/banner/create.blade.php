@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>添加banner</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('home.banner.store')}}" method="post">
                @include('admin.banner._form')
            </form>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.banner._js')
@endsection
