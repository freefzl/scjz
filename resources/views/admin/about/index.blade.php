@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>文化理念</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('about.about.update')}}" method="post">
                {{csrf_field()}}
                {{method_field('put')}}


                <div class="layui-form-item">
                    <label for="" class="layui-form-label ">首图</label>
                    <div class="layui-input-block my_width">
                        <div class="layui-upload">
                            <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c;</i>图片上传</button>
                            <div class="layui-upload-list" >
                                <ul id="layui-upload-box" class="layui-clear">
                                    @if(isset($about->img))
                                        <li><img src="{{ env('IMG_URL').$about->img }}" /><p>上传成功</p></li>
                                    @endif
                                </ul>
                                <input type="hidden" name="img" id="thumb" value="{{ $about->img??'' }}">
                                <span>上传jpg,png,gif格式的图片</span>
                            </div>

                        </div>
                    </div>
                </div>

                @include('vendor.ueditor.assets')
                <div class="layui-form-item">
                    <label for="" class="layui-form-label">内容</label>
                    <div class="layui-input-block">
                        <script id="container" name="content" type="text/plain">
                            {!! $about->content??old('content') !!}
                        </script>
                    </div>
                </div>
                @can('about.about.edit')
                <div class="layui-form-item">
                    <div class="layui-input-block my_width">
                        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
                    </div>
                </div>
                @endcan
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
        var ue = UE.getEditor('container',{
            toolbars: [[
                'fullscreen', 'source', '|', 'undo', 'redo', '|',
                'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                'directionalityltr', 'directionalityrtl', 'indent', '|',
                'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                'simpleupload', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe', 'insertcode', 'webapp', 'pagebreak', 'template', 'background', '|',
                'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
                'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
                'print', 'preview', 'searchreplace', 'help', 'drafts'
            ]]
        });
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.

        });

    </script>
@endsection
