{{csrf_field()}}

<div class="layui-form-item">
    <label for="" class="layui-form-label">资质类型</label>
    <div class="layui-input-block">
        <select name="type_id" lay-search lay-verify="required">
            <option value="">请选择</option>
            @forelse($aptitudeTypes as $perm)
                <option value="{{$perm['id']}}" {{ isset($aptitude->id) && $perm['id'] == $aptitude->type_id ? 'selected' : '' }} >{{$perm['name']}}</option>
                @if(isset($perm['_child']))
                    @foreach($perm['_child'] as $childs)
                        <option value="{{$childs['id']}}" {{ isset($aptitude->id) && $childs['id'] == $aptitude->type_id ? 'selected' : '' }} >&nbsp;&nbsp;┗━━{{$childs['name']}}</option>
                        @if(isset($childs['_child']))
                            @foreach($childs['_child'] as $lastChilds)
                                <option value="{{$lastChilds['id']}}" {{ isset($aptitude->id) && $lastChilds['id'] == $aptitude->type_id ? 'selected' : '' }} >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;┗━━{{$lastChilds['name']}}</option>
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
    <label for="" class="layui-form-label">资质名称</label>
    <div class="layui-input-block">
        <input type="text" name="name" value="{{$aptitude->name??old('name')}}"  lay-verify="required" placeholder="资质名称" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">服务地址</label>
    <div class="layui-input-block">
        <input type="text" name="url" value="{{$aptitude->url??old('url')}}"  lay-verify="required" placeholder="服务地址" class="layui-input" >
    </div>
</div>



<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="{{route('home.aptitude')}}" >返 回</a>
    </div>
</div>