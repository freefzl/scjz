<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ $site['title'] }}-服务项目列表</title>
	<meta name="keywords" content="{{ $site['keywords'] }}" />
	<meta name="description" content="{{ $site['description'] }}" />
	<link href="web/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="web/css/main.css"/>
	<link rel="stylesheet" href="web/css/all-sever.css"/>
	<script src="web/js/jquery-1.8.3.min.js"></script>

</head>
<body>

<!--导航-->
<div class="wl100">
	<div class="content"><span><img src="{{ env('IMG_URL') .$site['logo'] }}"></span>
		<div id="top-right"><div id="top-right-phone"><img src="web/img/24phone.png">免费热线：<b>{{$site['mobile']}}</b></div>
			<ul>
				@foreach($nav as $item)
					<li>

						<a href="{{$item['url']}}">{{$item['name']}}</a>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
<!--导航end-->
<div class="about_con">
	<div class="about">
		<div class="about_nav">
			<ul>
				<li class="about_nav_li"></li>
				<li class="about_nav_in">公司介绍</li>
				<li>文化理念</li>
				<li>发展历程</li>
				<li>公司风采</li>
				<li>公司招聘</li>
				<li>联系我们</li>
			</ul>
		</div>
		<div class="gywm">
			<div class="about_main comp1">
				<div class="about_main_tit1"><h2>公司介绍</h2></div>
				<div class="about_main_txt"><img src="{{ env('IMG_URL').$company['img'] }}">
					<p>{!! $company['content'] !!}</p>
				</div>
			</div>
			<div class="about_main comp2">
				<div class="about_main_tit1"><h2>文化理念</h2></div>
				<div class="about_main_txt"><img src="{{ env('IMG_URL').$concept['img'] }}">
					<p>{!! $concept['content'] !!}</p>
				</div>
			</div>
			<div class="about_main comp3">
				<div class="about_main_tit1"><h2>发展历程</h2></div>
				<div class="about_main_txt"><img src="{{ env('IMG_URL').$course['img'] }}">
					<p>{!! $course['content'] !!}</p>
				</div>
			</div>
			<div class="about_main comp4">
				<div class="about_main_tit1"><h2>公司风采</h2></div>
				<div class="about_main_txt"><img src="{{ env('IMG_URL').$mien['img'] }}">
					<p>{!! $mien['content'] !!}</p>
				</div>
			</div>
			<div class="about_main comp5">
				<div class="about_main_tit1"><h2>公司招聘</h2></div>
				<div class="about_main_txt"><img src="{{ env('IMG_URL').$job['img'] }}">
					<p>{!! $job['content'] !!}</p>
				</div>
			</div>
			<div class="about_main comp6">
				<div class="about_main_tit1"><h2>联系我们</h2></div>
				<div class="about_main_txt"><img src="{{ env('IMG_URL').$about['img'] }}">
					<p>{!! $about['content'] !!}</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!--底部-->
<footer>
	<div class="content">
		<div class="fot-left">
			@foreach($nav1 as $item)
				<a href="{{$item['url']}}">{{$item['name']}}</a> @if(!$loop->last)|@endif
			@endforeach

			<p>{{$site['copyright']}}</p>
		</div>
		<div class="fot-right"><img src="web/img/24.png">24小时服务热线：
			<h4>{{ $site['mobile'] }}</h4></div>
	</div>
</footer>
<!--底部 end-->
<script>
    $(function () {
        $(".about_nav li").click(function () {
            $(this).addClass("about_nav_in");
            var index = ($(".about_nav li").index(this)) ;
            $(".comp" + index).fadeIn();
            $(".about_main").not(".comp" + index).hide();
            $(this).siblings().removeClass("about_nav_in");
        })
    })
</script>
<style>
	.comp2, .comp3, .comp4, .comp5, .comp6{display: none}
</style>
<script>
    var host = '{{env('DOMAIN')}}';
    if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
        window.location.href = "http://m."+host;
    }
	{!! $site['statistical_code'] !!}


</script>
</body>
</html>