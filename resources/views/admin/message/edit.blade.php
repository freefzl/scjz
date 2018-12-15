@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>更新问答</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('product.answer.update',['id'=>$answer->id])}}" method="post">
                {{ method_field('put') }}
                @include('admin.answer._form')
            </form>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.answer._js')
@endsection
