{{csrf_field()}}

<div class="layui-form-item">
    <label for="" class="layui-form-label">新闻类型</label>
    <div class="layui-input-block">
        <input type="radio" name="type" value="new" title="公司新闻" @if($article->type =='new') checked @endif >
        <input type="radio" name="type" value="business" title="业务百科" @if($article->type =='business') checked @endif>
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">缩略图</label>
    <div class="layui-input-block">
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c;</i>缩略图上传</button>
            <div class="layui-upload-list" >
                <ul id="layui-upload-box" class="layui-clear">
                    @if(isset($article->thumb))
                        <li><img src="{{ env('IMG_URL').$article->thumb }}" /><p>上传成功</p></li>
                    @endif
                </ul>
                <input type="hidden" name="thumb" id="thumb" value="{{ $article->thumb??'' }}">
            </div>
            <span>上传jpg,png,gif格式的图片</span>
        </div>
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">标题</label>
    <div class="layui-input-block">
        <input type="text" name="title" value="{{$article->title??old('title')}}"  lay-verify="required" placeholder="标题（必填）" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">关键词</label>
    <div class="layui-input-block">
        <input type="text" name="keywords" value="{{$article->keywords??old('keywords')}}"  lay-verify="required" placeholder="关键词（必填）" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">描述</label>
    <div class="layui-input-block">
        <input type="text" name="description" value="{{$article->description??old('description')}}"  lay-verify="required" placeholder="描述（必填）" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">编辑</label>
    <div class="layui-input-block">
        <input type="text" name="editor" value="{{$article->editor??old('editor')}}"  lay-verify="required" placeholder="编辑（必填）" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">点击数</label>
    <div class="layui-input-block">
        <input type="text" name="click" value="{{$article->click??old('click')}}"   placeholder="点击数" class="layui-input" >
    </div>
</div>

@include('vendor.ueditor.assets')
<div class="layui-form-item">
    <label for="" class="layui-form-label">内容</label>
    <div class="layui-input-block">
        <script id="container" name="content" type="text/plain">
            {!! $article->content??old('content') !!}
        </script>
    </div>
</div>


<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="{{route('admin.article')}}" >返 回</a>
    </div>
</div>