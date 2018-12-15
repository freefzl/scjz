{{csrf_field()}}

<div class="layui-form-item">
    <label for="" class="layui-form-label">跳转链接</label>
    <div class="layui-input-block">
        <input type="radio" name="type" value="1" title="顶部导航" checked>
        <input type="radio" name="type" value="2" title="尾部导航">
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">导航名称</label>
    <div class="layui-input-block">
        <input type="text" name="name" value="{{$nav->name??old('name')}}" lay-verify="required"  placeholder="导航名称" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">跳转链接</label>
    <div class="layui-input-block">
        <input type="text" name="url" value="{{$nav->url??old('url')}}" lay-verify="required"  placeholder="跳转链接" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">排序</label>
    <div class="layui-input-block">
        <input type="number" name="sort" value="{{$nav->sort??old('sort')}}" lay-verify="required"  placeholder="排序(值越大越靠前)" class="layui-input" >
    </div>
</div>




<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="{{route('admin.nav')}}" >返 回</a>
    </div>
</div>