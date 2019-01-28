{{csrf_field()}}

<div class="layui-form-item">
    <label for="" class="layui-form-label">父级</label>
    <div class="layui-input-block">
        <select name="parent_id" lay-search>
            <option value="0">顶级类型</option>
            @forelse($productTypes as $perm)
                <option value="{{$perm['id']}}" {{ isset($productType->id) && $perm['id'] == $productType->parent_id ? 'selected' : '' }} >{{$perm['name']}}</option>
                @if(isset($perm['_child']))
                    @foreach($perm['_child'] as $childs)
                        <option value="{{$childs['id']}}" {{ isset($productType->id) && $childs['id'] == $productType->parent_id ? 'selected' : '' }} >&nbsp;&nbsp;┗━━{{$childs['name']}}</option>
                        @if(isset($childs['_child']))
                            @foreach($childs['_child'] as $lastChilds)
                                <option value="{{$lastChilds['id']}}" {{ isset($productType->id) && $lastChilds['id'] == $productType->parent_id ? 'selected' : '' }} >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;┗━━{{$lastChilds['name']}}</option>
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
                    @if(isset($productType->img))
                        <li><img src="{{ env('IMG_URL').$productType->img }}" /><p>上传成功</p></li>
                    @endif
                </ul>
                <input type="hidden" name="img" id="thumb" value="{{ $productType->img??'' }}">
            </div>
            <span>上传jpg,png,gif格式的图片</span>
        </div>
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">分类名称</label>
    <div class="layui-input-block">
        <input type="text" name="name" value="{{$productType->name??old('name')}}"  lay-verify="required" placeholder="分类名称（必填）" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">简介</label>
    <div class="layui-input-block">
        <input type="text" name="abstract" value="{{$productType->abstract??old('abstract')}}"  lay-verify="required" placeholder="简介（必填）" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">排序</label>
    <div class="layui-input-block">
        <input type="number" name="sort" value="{{$productType->sort??old('sort')}}"  lay-verify="required" placeholder="排序（必填 值越大越靠前)" class="layui-input" >
    </div>
</div>



<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="{{route('product.productType')}}" >返 回</a>
    </div>
</div>