{{csrf_field()}}

<div class="layui-form-item">
    <label for="" class="layui-form-label">所属分类</label>
    <div class="layui-input-block">
        <select name="type_id" lay-search lay-verify="required">
            <option value="">请选择</option>
            @forelse($productTypes as $perm)
                <option value="{{$perm['id']}}" {{ isset($product->id) && $perm['id'] == $product->type_id ? 'selected' : '' }} >{{$perm['name']}}</option>
            @empty
            @endforelse
        </select>
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">产品图</label>
    <div class="layui-input-block">
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c;</i>图片上传</button>
            <div class="layui-upload-list" >
                <ul id="layui-upload-box" class="layui-clear">
                    @if(isset($product->img))
                        <li><img src="{{ env('IMG_URL').$product->img }}" /><p>上传成功</p></li>
                    @endif
                </ul>
                <input type="hidden" name="img" id="thumb" value="{{ $product->img??'' }}">
            </div>
            <span>上传jpg,png,gif格式的图片</span>
        </div>
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">标题</label>
    <div class="layui-input-block">
        <input type="text" name="title" value="{{$product->title??old('title')}}" lay-verify="required" placeholder="标题(必填)" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">标签</label>
    <div class="layui-input-block">
        <input type="text" name="tag" value="{{$product->tag??old('tag')}}" lay-verify="required" placeholder="标签(必填)" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">服务承诺</label>
    <div class="layui-input-block">
        <input type="text" name="commitment" value="{{$product->commitment??old('commitment')}}" lay-verify="required" placeholder="服务承诺(必填)" class="layui-input" >
    </div>
</div>


<div class="layui-form-item">
    <label for="" class="layui-form-label">简介</label>
    <div class="layui-input-block">
        <input type="text" name="abstract" value="{{$product->abstract??old('abstract')}}" lay-verify="required" placeholder="简介(必填)" class="layui-input" >
    </div>
</div>
@include('vendor.ueditor.assets')
<div class="layui-form-item">
    <label for="" class="layui-form-label">服务介绍</label>
    <div class="layui-input-block">
        <script id="container" name="introduce" type="text/plain">
            {!! $product->introduce??old('introduce') !!}
        </script>
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">服务保障</label>
    <div class="layui-input-block">
        <script id="container1" name="security" type="text/plain">
            {!! $product->security??old('security') !!}
        </script>
    </div>
</div>


<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="{{route('product.product')}}" >返 回</a>
    </div>
</div>