@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>添加了解</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('home.know.store')}}" method="post">
                @include('admin.know._form')
            </form>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.know._js')
@endsection
