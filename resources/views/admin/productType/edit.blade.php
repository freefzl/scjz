@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>更新产品类型</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('product.productType.update',['id'=>$productType->id])}}" method="post">
                {{ method_field('put') }}
                @include('admin.productType._form')
            </form>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.productType._js')
@endsection
