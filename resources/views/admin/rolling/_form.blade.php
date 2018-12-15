{{csrf_field()}}


<div class="layui-form-item">
    <label for="" class="layui-form-label">滚动图</label>
    <div class="layui-input-block">
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c;</i>图片上传</button>
            <div class="layui-upload-list" >
                <ul id="layui-upload-box" class="layui-clear">
                    @if(isset($rolling->img))
                        <li><img src="{{ env('IMG_URL').$rolling->img }}" /><p>上传成功</p></li>
                    @endif
                </ul>
                <input type="hidden" name="img" id="thumb" value="{{ $rolling->img??'' }}">
            </div>
            <span>上传jpg,png,gif格式的图片</span>
        </div>
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">名称</label>
    <div class="layui-input-block">
        <input type="text" name="name" value="{{$rolling->name??old('name')}}" lay-verify="required"  placeholder="名称" class="layui-input" >
    </div>
</div>



<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="{{route('home.rolling')}}" >返 回</a>
    </div>
</div>