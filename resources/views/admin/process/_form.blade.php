{{csrf_field()}}




{{--<div class="layui-form-item">
    <label for="" class="layui-form-label">图标效果1</label>
    <div class="layui-input-block">
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c;</i>图片上传</button>
            <div class="layui-upload-list" >
                <ul id="layui-upload-box" class="layui-clear layui-upload-box">
                    @if(isset($process->img))
                        <li><img src="{{ env('IMG_URL').$process->img }}" /><p>上传成功</p></li>
                    @endif
                </ul>
                <input type="hidden" name="img" id="thumb" value="{{ $process->img??'' }}">
            </div>
            <span>上传jpg,png,gif格式的图片</span>
        </div>
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">图标效果2</label>
    <div class="layui-input-block">
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="uploadPic1"><i class="layui-icon">&#xe67c;</i>图片上传</button>
            <div class="layui-upload-list" >
                <ul id="layui-upload-box1" class="layui-clear layui-upload-box">
                    @if(isset($process->img1))
                        <li><img src="{{ env('IMG_URL').$process->img1 }}" /><p>上传成功</p></li>
                    @endif
                </ul>
                <input type="hidden" name="img1" id="thumb1" value="{{ $process->img1??'' }}">
            </div>
            <span>上传jpg,png,gif格式的图片</span>
        </div>
    </div>
</div>--}}

<div class="layui-form-item">
    <label for="" class="layui-form-label">标题</label>
    <div class="layui-input-block">
        <input type="text" name="title" value="{{$process->title??old('title')}}"  lay-verify="required" placeholder="标题" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">简介内容</label>
    <div class="layui-input-block">
        <input type="text" name="content" value="{{$process->content??old('content')}}"  lay-verify="required" placeholder="简介内容" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">排序</label>
    <div class="layui-input-block">
        <input type="text" name="sort" value="{{$process->sort??old('sort')}}"  lay-verify="required" placeholder="排序(越大越靠前)" class="layui-input" >
    </div>
</div>



<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="{{route('home.process')}}" >返 回</a>
    </div>
</div>