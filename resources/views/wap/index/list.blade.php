<!DOCTYPE html>
<html>

	<head>

		<title>{{ $site['title'] }}-列表</title>
		<meta name="keywords" content="{{ $site['keywords'] }}" />
		<meta name="description" content="{{ $site['description'] }}" />
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
		<meta content="yes" name="apple-mobile-web-app-capable">
		<meta content="yes" name="apple-touch-fullscreen">
		<meta content="telephone=no,email=no" name="format-detection">
		<meta charset="UTF-8">
		<link href="/wap/css/main.css" rel="stylesheet">
		<script src="/wap/js/jquery-1.8.3.min.js"></script>
	</head>

	<body class="bg-f5">

		<section>
			<!--菜单列表-->
			
				<div class="list-header">
					<div class="list-header-box">
						<input type="search" class="list-header-search" placeholder="请输入所需要服务的名称" />
					</div>
				</div>
				<!--菜单列表end-->
				<!--菜单详情-->
				<div class="list-main">
					@foreach($list as $item)
						<div class="list-mainbox">
							<div class="list-infobox">
								<div class="list-infobox-img"><a href="/details/{{$item['id']}}"><img src="{{env('IMG_URL').$item['img']}}" width="100%" height="100%"/></a></div>
								<div class="list-infobox-con">
									<div class="list-infotitle"><a href="/details/{{$item['id']}}">{{$item['title']}}</a> </div>
									<div class="list-infosubheading">{{$item['abstract']}}</div>
								</div>
							</div>
						</div>
					@endforeach

					
				</div>
				<!--菜单详情 end-->
				<!--底部导航-->
				<footer>
					<ul>
						<a href="/"><li><img src="/wap/images/ft-sy.png" /><br>首页</li></a>
						<a href="/class"><li><img src="/wap/images/ft-fl1.png" /><br>分类</li></a>
						<a href=""><li><img src="/wap/images/ft-zx.png" /><br>咨询</li></a>
					</ul>
				</footer>
				<!--底部导航end-->
			
		</section>
		<script>
			$(function() {
				$("#menu-left li").click(function() {
					$(this).addClass("li-on");
					$(this).siblings().removeClass("li-on");
					var index = ($("#menu-left li").index(this)) + 1;
					$(".li-" + index).fadeIn();
					$(".menu-main-li").not(".li-" + index).hide();
					//菜单tab切换
				})
			})

			$('.list-header-search').keyup(function () {
			    $('.list-main').children('div').remove();
			    var key = $('.list-header-search').val();
			    var type_id = '{{$id}}'
				var host = '{{env('IMG_URL')}}';
                $.ajax({
                    type: 'POST',
                    url: "{{route('search')}}",
                    data: {'_token': '{{ csrf_token() }}',key:key,type_id:type_id},
                    success: function (res) {

                        if(res.code === 0){
                            var html="";
                            $.each(res.data, function(k,v) {//这里的函数参数是键值对的形式，k代表键名，v代表值
                                html+='<div class="list-mainbox">' +
									'<div class="list-infobox">' +
									'<div class="list-infobox-img"><a href="/details/'+v.id+'"><img src="'+host+v.img+'" width="100%" height="100%"/></a></div>' +
									'<div class="list-infobox-con">' +
									'<div class="list-infotitle"><a href="/details/'+v.id+'">'+v.title+' </a></div>' +
									'<div class="list-infosubheading">'+v.abstract+'</div>' +
									'</div>' +
									'</div>' +
									'</div>'

                            });
                            $(".list-main").html(html);
                        }else{
                            layer.msg('系统错误', {
                                time: 2000, //20s后自动关闭
                            });
                        }
                    }
                });
            })
			{!! $site['statistical_code'] !!}
		</script>

	</body>

</html>