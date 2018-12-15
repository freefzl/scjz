@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>更新合作机构</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('home.institution.update',['id'=>$institution->id])}}" method="post">
                {{ method_field('put') }}
                @include('admin.institution._form')
            </form>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.institution._js')
@endsection
