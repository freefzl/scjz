@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>站点配置</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('home.site.update')}}" method="post">
                {{csrf_field()}}
                {{method_field('put')}}


                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">logo</label>
                    <div class="layui-input-block my_width">
                        <div class="layui-upload">
                            <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c;</i>图片上传</button>
                            <div class="layui-upload-list" style="margin-left: 50px;">
                                <ul id="layui-upload-box" class="layui-clear">
                                    @if(isset($config['logo']))
                                        <li><img src="{{ env('IMG_URL').$config['logo'] }}" /><p>上传成功</p></li>
                                    @endif
                                </ul>
                                <input type="hidden" name="logo" id="thumb" value="{{ $config['logo']??'' }}">
                                <span>上传jpg,png,gif格式的图片</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">问候语</label>
                    <div class="layui-input-block my_width">
                        <input type="text" name="hello" value="{{ $config['hello']??'' }}" lay-verify="required" placeholder="请输入问候语" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">微信关注</label>
                    <div class="layui-input-block my_width">
                        <input type="text" name="weixin" value="{{ $config['weixin']??'' }}" lay-verify="required" placeholder="请输入微信关注" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">联系我们</label>
                    <div class="layui-input-block my_width">
                        <input type="text" name="about" value="{{ $config['about']??'' }}" lay-verify="required" placeholder="请输入联系我们" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">联系客服</label>
                    <div class="layui-input-block my_width">
                        <input type="text" name="service" value="{{ $config['service']??'' }}" lay-verify="required" placeholder="请输入联系客服" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">电话</label>
                    <div class="layui-input-block my_width">
                        <input type="text" name="mobile" value="{{ $config['mobile']??'' }}" lay-verify="required" placeholder="请输入电话" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">成功办理服务</label>
                    <div class="layui-input-block my_width">
                        <input type="number" name="number1" value="{{ $config['number1']??'' }}" lay-verify="required" placeholder="请输入成功办理服务基数" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">服务办理案件</label>
                    <div class="layui-input-block my_width">
                        <input type="number" name="number2" value="{{ $config['number2']??'' }}" lay-verify="required" placeholder="请输入服务办理案件基数" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">资质办理类型</label>
                    <div class="layui-input-block my_width">
                        <input type="number" name="number3" value="{{ $config['number3']??'' }}" lay-verify="required" placeholder="请输入资质办理类型基数" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">资质服务标题前</label>
                    <div class="layui-input-block my_width">
                        <input type="text" name="title1" value="{{ $config['title1']??'' }}" lay-verify="required" placeholder="请输入资质服务标题前" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">资质服务标题后</label>
                    <div class="layui-input-block my_width">
                        <input type="text" name="title1_1" value="{{ $config['title1_1']??'' }}" lay-verify="required" placeholder="请输入资质服务标题后" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">资质服务标题简介</label>
                    <div class="layui-input-block my_width">
                        <input type="text" name="title1_2" value="{{ $config['title1_2']??'' }}" lay-verify="required" placeholder="请输入资质服务标题简介" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">标准化流程标题</label>
                    <div class="layui-input-block my_width">
                        <input type="text" name="title2" value="{{ $config['title2']??'' }}" lay-verify="required" placeholder="请输入标准化流程标题" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">标准化流程标题简介</label>
                    <div class="layui-input-block my_width">
                        <input type="text" name="title2_1" value="{{ $config['title2_1']??'' }}" lay-verify="required" placeholder="请输入标准化流程标题简介" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">了解标题前</label>
                    <div class="layui-input-block my_width">
                        <input type="text" name="title3" value="{{ $config['title3']??'' }}" lay-verify="required" placeholder="请输入了解标题前" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">了解标题后</label>
                    <div class="layui-input-block my_width">
                        <input type="text" name="title3_1" value="{{ $config['title3_1']??'' }}" lay-verify="required" placeholder="请输入了解标题后" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">了解标题简介</label>
                    <div class="layui-input-block my_width">
                        <input type="text" name="title3_2" value="{{ $config['title3_2']??'' }}" lay-verify="required" placeholder="请输入了解标题简介" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth" >合作机构标题</label>
                    <div class="layui-input-block my_width">
                        <input type="text" name="title4" value="{{ $config['title4']??'' }}" lay-verify="required" placeholder="请输入合作机构标题" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">站点标题</label>
                    <div class="layui-input-block my_width">
                        <input type="text" name="title" value="{{ $config['title']??'' }}" lay-verify="required" placeholder="请输入站点标题" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">站点关键词</label>
                    <div class="layui-input-block my_width">
                        <input type="text" name="keywords" value="{{ $config['keywords']??'' }}" lay-verify="required" placeholder="请输入站点关键词" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">CopyRight</label>
                    <div class="layui-input-block my_width">
                        <input type="text" name="copyright" value="{{ $config['copyright']??'' }}" lay-verify="required" placeholder="请输入copyright" class="layui-input" >
                    </div>
                </div>
                {{--<div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">乐语帐号</label>
                    <div class="layui-input-block my_width">
                        <input type="text" name="leyu" value="{{ $config['leyu']??'' }}" lay-verify="required" placeholder="请输入乐语帐号" class="layui-input" >
                    </div>
                </div>--}}
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">站点描述</label>
                    <div class="layui-input-block my_width">
                        <textarea class="layui-textarea" name="description" cols="30" rows="10">{{ $config['description']??'' }}</textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label mywidth">统计代码</label>
                    <div class="layui-input-block my_width">
                        <textarea class="layui-textarea" name="statistical_code" cols="30" rows="10">{{ $config['statistical_code']??'' }}</textarea>
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-input-block my_width">
                        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <style>
        #layui-upload-box li{
            width: 120px;
            height: 100px;
            float: left;
            position: relative;
            overflow: hidden;
            margin-right: 10px;
            border:1px solid #ddd;
        }
        #layui-upload-box li img{
            width: 100%;
        }
        #layui-upload-box li p{
            width: 100%;
            height: 22px;
            font-size: 12px;
            position: absolute;
            left: 0;
            bottom: 0;
            line-height: 22px;
            text-align: center;
            color: #fff;
            background-color: #333;
            opacity: 0.6;
        }
        #layui-upload-box li i{
            display: block;
            width: 20px;
            height:20px;
            position: absolute;
            text-align: center;
            top: 2px;
            right:2px;
            z-index:999;
            cursor: pointer;
        }
        .mywidth{
            width: 130px;
        }
        .layui-input{
            width: 85%;!important;
        }
        .layui-textarea{
            width: 85%;!important;
        }
    </style>
    <script>
        layui.use(['upload'],function () {
            var upload = layui.upload

            //普通图片上传
            var uploadInst = upload.render({
                elem: '#uploadPic'
                ,url: '{{ route("uploadImg") }}'
                ,multiple: false
                ,data:{"_token":"{{ csrf_token() }}"}
                ,size:2048
                ,exts:'jpg|png|gif'
                ,before: function(obj){
                    //预读本地文件示例，不支持ie8
                    /*obj.preview(function(index, file, result){
                     $('#layui-upload-box').append('<li><img src="'+result+'" /><p>待上传</p></li>')
                     });*/
                    obj.preview(function(index, file, result){
                        $('#layui-upload-box').html('<li><img src="'+result+'" /><p>上传中</p></li>')
                    });

                }
                ,done: function(res){
                    //如果上传失败
                    if(res.code == 0){
                        $("#thumb").val(res.url);
                        $('#layui-upload-box li p').text('上传成功');
                        return layer.msg(res.msg);
                    }
                    return layer.msg(res.msg);
                }
            });
        })
    </script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
        });
    </script>
@endsection
