{{csrf_field()}}




<div class="layui-form-item">
    <label for="" class="layui-form-label">合作机构图</label>
    <div class="layui-input-block">
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c;</i>图片上传</button>
            <div class="layui-upload-list" >
                <ul id="layui-upload-box" class="layui-clear">
                    @if(isset($institution->img))
                        <li><img src="{{ env('IMG_URL').$institution->img }}" /><p>上传成功</p></li>
                    @endif
                </ul>
                <input type="hidden" name="img" id="thumb" value="{{ $institution->img??'' }}">
            </div>
            <span>上传jpg,png,gif格式的图片</span>
        </div>
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">链接地址</label>
    <div class="layui-input-block">
        <input type="text" name="url" value="{{$institution->url??old('url')}}"  lay-verify="required" placeholder="标题" class="layui-input" >
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="{{route('home.institution')}}" >返 回</a>
    </div>
</div>