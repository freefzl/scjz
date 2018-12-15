@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>更新产品</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('product.product.update',['id'=>$product->id])}}" method="post">
                {{ method_field('put') }}
                @include('admin.product._form')
            </form>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.product._js')
@endsection
