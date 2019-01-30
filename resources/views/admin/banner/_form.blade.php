{{csrf_field()}}

<div class="layui-form-item">
    <label for="" class="layui-form-label">图片类型</label>
    <div class="layui-input-block">
        <input type="radio" name="type" value="1" title="幻灯片" @if($banner->type ==1) checked @endif>
        <input type="radio" name="type" value="2" title="左边悬浮图" @if($banner->type ==2) checked @endif>
        <input type="radio" name="type" value="3" title="wap端幻灯片"@if($banner->type ==3) checked @endif>
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">banner图</label>
    <div class="layui-input-block">
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c;</i>图片上传</button>
            <div class="layui-upload-list" >
                <ul id="layui-upload-box" class="layui-clear">
                    @if(isset($banner->banner))
                        <li><img src="{{ env('IMG_URL').$banner->banner }}" /><p>上传成功</p></li>
                    @endif
                </ul>
                <input type="hidden" name="banner" id="thumb" value="{{ $banner->banner??'' }}">
            </div>
            <span>上传jpg,png,gif格式的图片</span>
        </div>
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">跳转链接</label>
    <div class="layui-input-block">
        <input type="text" name="url" value="{{$banner->url??old('url')}}"  placeholder="跳转链接" class="layui-input" >
    </div>
</div>



<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="{{route('home.banner')}}" >返 回</a>
    </div>
</div>