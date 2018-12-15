{{csrf_field()}}

<div class="layui-form-item">
    <label for="" class="layui-form-label">父级</label>
    <div class="layui-input-block">
        <select name="parent_id" lay-search>
            <option value="0">顶级类型</option>
            @forelse($aptitudeTypes as $perm)
                <option value="{{$perm['id']}}" {{ isset($aptitudeType->id) && $perm['id'] == $aptitudeType->parent_id ? 'selected' : '' }} >{{$perm['name']}}</option>
                @if(isset($perm['_child']))
                    @foreach($perm['_child'] as $childs)
                        <option value="{{$childs['id']}}" {{ isset($aptitudeType->id) && $childs['id'] == $aptitudeType->parent_id ? 'selected' : '' }} >&nbsp;&nbsp;┗━━{{$childs['name']}}</option>
                        @if(isset($childs['_child']))
                            @foreach($childs['_child'] as $lastChilds)
                                <option value="{{$lastChilds['id']}}" {{ isset($aptitudeType->id) && $lastChilds['id'] == $aptitudeType->parent_id ? 'selected' : '' }} >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;┗━━{{$lastChilds['name']}}</option>
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @empty
            @endforelse
        </select>
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">分类图标</label>
    <div class="layui-input-block">
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c;</i>图片上传</button>
            <div class="layui-upload-list" >
                <ul id="layui-upload-box" class="layui-clear">
                    @if(isset($aptitudeType->img))
                        <li><img src="{{ env('IMG_URL').$aptitudeType->img }}" /><p>上传成功</p></li>
                    @endif
                </ul>
                <input type="hidden" name="img" id="thumb" value="{{ $aptitudeType->img??'' }}">
            </div>
            <span>上传jpg,png,gif格式的图片</span>
        </div>
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">分类名称</label>
    <div class="layui-input-block">
        <input type="text" name="name" value="{{$aptitudeType->name??old('name')}}"  lay-verify="required" placeholder="分类名称" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">简述</label>
    <div class="layui-input-block">
        <input type="text" name="abstract" value="{{$aptitudeType->abstract??old('abstract')}}"   placeholder="分类名称" class="layui-input" >
    </div>
</div>



<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="{{route('home.aptitudeType')}}" >返 回</a>
    </div>
</div>