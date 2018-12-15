{{csrf_field()}}



<div class="layui-form-item">
    <label for="" class="layui-form-label">问题</label>
    <div class="layui-input-block">
        <input type="text" name="question" value="{{$answer->question??old('question')}}"  lay-verify="required" placeholder="问题（必填）" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">回答</label>
    <div class="layui-input-block">
        <input type="text" name="answer" value="{{$answer->answer??old('answer')}}"  lay-verify="required" placeholder="回答（必填）" class="layui-input" >
    </div>
</div>


<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="{{route('product.answer')}}" >返 回</a>
    </div>
</div>