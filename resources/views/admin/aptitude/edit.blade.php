@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>更新资质</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('home.aptitude.update',['id'=>$aptitude->id])}}" method="post">
                {{ method_field('put') }}
                @include('admin.aptitude._form')
            </form>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.aptitude._js')
@endsection
