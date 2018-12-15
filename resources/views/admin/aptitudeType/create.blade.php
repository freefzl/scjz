@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>添加资质类型</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('home.aptitudeType.store')}}" method="post">
                @include('admin.aptitudeType._form')
            </form>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.aptitudeType._js')
@endsection
