<!DOCTYPE html>
<html>

	<head>
		<title>{{ $site['title'] }}-分类</title>
		<meta name="keywords" content="{{ $site['keywords'] }}" />
		<meta name="description" content="{{ $site['description'] }}" />
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
		<meta content="yes" name="apple-mobile-web-app-capable">
		<meta content="yes" name="apple-touch-fullscreen">
		<meta content="telephone=no,email=no" name="format-detection">
		<meta charset="UTF-8">
		<link href="wap/css/main.css" rel="stylesheet">
		<script src="wap/js/jquery-1.8.3.min.js"></script>
	</head>
	<style>
		.menu-main-li{
			display: none;
		}
	</style>
	<body>

		<section>
			<!--菜单列表-->
			<ul id="menu-left">
				@foreach($type as $k=>$item)
				<li @if($loop->first)class="li-on"@endif>{{$item['name']}}</li>
				{{--<li>知识产权</li>--}}
				{{--<li>资质办理</li>--}}
					@endforeach
			</ul>
			<!--菜单列表end-->
			<!--菜单详情-->
			<div class="menu-main">
				@foreach($type as $k=>$item)
				<div class="menu-main-li  li-{{$k+1}}" @if($loop->first)style="display: block" @endif>
					{{--<div class="menu-banner"><img src="wap/images/banner1.jpg"></div>--}}
					<h4>{{$item['name']}}</h4>
					<ul>
						@foreach($item['son'] as $value)
						<li>
							<a href="/product/{{$value['id']}}"><img src="{{env('IMG_URL').$value['img']}}"><br>{{$value['name']}}</a>
						</li>
						@endforeach
					</ul>
				</div>
				@endforeach
				{{--<div class="menu-main-li li-2">
					<div class="menu-banner"><img src="wap/images/banner1.jpg"></div>
					<h4>知识产权</h4>
					<ul>
						<li>
							<a href=""><img src="wap/images/icon-01.png"><br>总承包资质</a>
						</li>
						<li>
							<a href=""><img src="wap/images/icon-02.png"><br>专业承包资质</a>
						</li>
						<li>
							<a href=""><img src="wap/images/icon-03.png"><br>证书培训</a>
						</li>
						<li>
							<a href=""><img src="wap/images/icon-04.png"><br>其他资质办理</a>
						</li>
					</ul>
				</div>
				<div class="menu-main-li li-3">
					<div class="menu-banner"><img src="wap/images/banner1.jpg"></div>
					<h4>建筑资质</h4>
					<ul>
						<li>
							<a href=""><img src="wap/images/icon-01.png"><br>总承包资质</a>
						</li>
						<li>
							<a href=""><img src="wap/images/icon-02.png"><br>专业承包资质</a>
						</li>
						<li>
							<a href=""><img src="wap/images/icon-03.png"><br>证书培训</a>
						</li>
						<li>
							<a href=""><img src="wap/images/icon-04.png"><br>其他资质办理</a>
						</li>
					</ul>
				</div>--}}
			</div>
			<!--菜单详情 end-->
			<!--底部导航-->
			<footer>
				<ul>
					<a href="/"><li><img src="wap/images/ft-sy.png" /><br>首页</li></a>
					<a href="/class"><li><img src="wap/images/ft-fl1.png" /><br>分类</li></a>
					<a href=""><li><img src="wap/images/ft-zx.png" /><br>咨询</li></a>
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
            var host = '{{env('DOMAIN')}}';
            if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {

            }else{
                window.location.href = "http://www."+host;
            }
			{!! $site['statistical_code'] !!}
		</script>

	</body>

</html>