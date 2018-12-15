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
	<script type="text/javascript" src="web/js/jquery.js"></script>
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
<!--content start-->

<div class="page-content">
	<!--导航 start-->
	<div class="service-title w1200">

	</div>
	<div class="all-sever-page w1200">
		<div class="page-tit-nav">
			@foreach($product_type as $item)
				<ul class="clear" @if($loop->last) style="border: none" @endif>
					<li class="li1">{{$item['name']}}：</li>
					<li class="li2">
						@foreach($item['son'] as $value)
							<a class="dib @if($loop->first) active @endif" href="javascript:;" onclick="getData(this,'{{$value['id']}}')">{{ $value['name'] }}</a>
						@endforeach
						{{--<a class="dib " href="/">建筑公司收购</a>--}}
						{{--<a class="dib active" href="/">股权转让</a>--}}
						{{--<a class="dib " href="/">设计资质</a>--}}
						{{--<a class="dib " href="/">房地产开发资质</a>--}}
						{{--<a class="dib " href="/">入川备案</a>--}}

					</li>
				</ul>
			@endforeach

			{{--<ul class="clear">--}}
				{{--<li class="li1">--}}
					{{--资质办理:--}}
				{{--</li>--}}
				{{--<li class="li2">--}}
					{{--<!--<a class="dib active" href="javascript:void(0)">全部</a>-->--}}
					{{--<a class="dib active" href="/">建筑资质</a>--}}
				{{--</li>--}}
			{{--</ul>--}}
			{{--<ul class="clear" style="border:none">--}}
				{{--<li class="li1">--}}
					{{--建筑资质:--}}
				{{--</li>--}}
				{{--<li class="li2">--}}
					{{--<!--<a class="dib active" href="javascript:void(0)">全部</a>-->--}}
					{{--<a class="dib active" href="/">总承包资质</a>--}}
					{{--<a class="dib " href="/">专业承包资质</a>--}}
					{{--<a class="dib " href="/">证书培训</a>--}}
					{{--<a class="dib " href="/">其他资质办理</a>--}}
				{{--</li>--}}
			{{--</ul>--}}
		</div>
	</div>
	<!--导航 end-->
	<div class="service-content w1200 clear">
		<div class="container clear">
			@foreach($product as $item)
				<div class="list">
					<div class="up">
						<a href="/details/{{$item['id']}}"><img src="{{env('IMG_URL').$item['img']}}"
										 title="{{$item['title']}}" alt="{{$item['title']}}"/></a>
					</div>
					<div class="down">
						<h3 class="down-p1">{{$item['title']}} </h3>
						<p class="down-p2 text-overflow2">{{$item['abstract']}}</p>
						<div class="price-btn clear">
							<a class="btnh" href="/details/{{$item['id']}}">查看详情</a>
						</div>
					</div>
				</div>
			@endforeach
			{{--<div class="list">
				<div class="up">
					<a href="/"><img src="web/img/918fe3ac31057538d0c7115c1a87dfc8.jpg"
									 title="水利水电工程施工总承包资质" alt="水利水电工程施工总承包资质"/></a>
				</div>
				<div class="down">
					<h3 class="down-p1">水利水电工程施工总承包资质 </h3>
					<p class="down-p2 text-overflow2">顶呱呱建筑资质办理，专注建筑资质代办服务，专人跟进，收悉行业政策。</p>
					<div class="price-btn clear">
						<p class="down-p3">￥1.00</p>
						<a class="btnh" href="/detail">查看详情</a>
					</div>
				</div>
			</div>
			<div class="list">
				<div class="up">
					<a href="/"><img src="web/img/2582ba4f93bbbd01c6bb551f9aec1ee0.jpg"
									 title="通信工程施工总承包资质" alt="通信工程施工总承包资质"/></a>
				</div>
				<div class="down">
					<h3 class="down-p1">通信工程施工总承包资质 </h3>
					<p class="down-p2 text-overflow2">多年行业经验，一对一专业顾问服务，快速审批通道，快至1个月拿证。</p>
					<div class="price-btn clear">
						<p class="down-p3">￥1.00</p>
						<a class="btnh" href="/detail">查看详情</a>
					</div>
				</div>
			</div>
			<div class="list">
				<div class="up">
					<a href="/"><img src="web/img/1a0f8a19c9fa535f9711df727f6eb6cb.jpg"
									 title="机电安装工程施工总承包资质" alt="机电安装工程施工总承包资质"/></a>
				</div>
				<div class="down">
					<h3 class="down-p1">机电安装工程施工总承包资质 </h3>
					<p class="down-p2 text-overflow2">多年行业办理经验，专注建筑资质代办服务，专人跟进，收悉行业政策。</p>
					<div class="price-btn clear">
						<p class="down-p3">￥1.00</p>
						<a class="btnh" href="/detail">查看详情</a>
					</div>
				</div>
			</div>
			<div class="list">
				<div class="up">
					<a href="/"><img src="web/img/92d0d68eeb226925645c58800390b572.jpg"
									 title="房屋建筑工程施工总承包资质" alt="房屋建筑工程施工总承包资质"/></a>
				</div>
				<div class="down">
					<h3 class="down-p1">房屋建筑工程施工总承包资质 </h3>
					<p class="down-p2 text-overflow2">多年办理经验，一对一专业顾问服务，快速审批通道，快至1个月拿证。</p>
					<div class="price-btn clear">
						<p class="down-p3">￥1.00</p>
						<a class="btnh" href="/detail">查看详情</a>
					</div>
				</div>
			</div>
			<div class="list">
				<div class="up">
					<a href="/"><img src="web/img/a2df48ad4452d5baf99f11cca0a8b20c.jpg"
									 title="公路工程施工总承包资质" alt="公路工程施工总承包资质"/></a>
				</div>
				<div class="down">
					<h3 class="down-p1">公路工程施工总承包资质 </h3>
					<p class="down-p2 text-overflow2">专注建筑资质代办服务，专人跟进，收悉行业政策。</p>
					<div class="price-btn clear">
						<p class="down-p3">￥1.00</p>
						<a class="btnh" href="/detail">查看详情</a>
					</div>
				</div>
			</div>
			<div class="list">
				<div class="up">
					<a href="/"><img src="web/img/19b654807661fe3701b949d0b61e01ae.jpg"
									 title="电力工程施工总承包资质" alt="电力工程施工总承包资质"/></a>
				</div>
				<div class="down">
					<h3 class="down-p1">电力工程施工总承包资质 </h3>
					<p class="down-p2 text-overflow2">一对一专业顾问服务，快速审批通道，快至1个月拿证。</p>
					<div class="price-btn clear">
						<p class="down-p3">￥1.00</p>
						<a class="btnh" href="/detail">查看详情</a>
					</div>
				</div>
			</div>--}}
		</div>

		<div class="pagination w1200 clear" id="allService">
		</div>
	</div>
</div>
<!--页面路径 end-->

<!--content end-->
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

	function getData(obj,id) {
	    var img_url = '{{env('IMG_URL')}}';

	    $('.page-tit-nav').find('a').removeClass('active');
	    $(obj).addClass('active');
	    $('.container').children('div').remove();
        $.ajax({
            type: 'POST',
            url: "{{route('getProduct')}}",
            data: {'_token': '{{ csrf_token() }}',id:id},
            success: function (res) {

                if(res.code === 0){
                    var html="";
                    $.each(res.data, function(k,v) {//这里的函数参数是键值对的形式，k代表键名，v代表值
                        html+='<div class="list">' +
							'<div class="up">' +
							'<a href="/details/'+v.id+'"><img src="'+img_url+v.img+'" title="'+v.title+'" alt="'+v.title+'"/></a>' +
							'</div>' +
							'<div class="down">' +
							'<h3 class="down-p1">'+v.title+' </h3>' +
							'<p class="down-p2 text-overflow2">'+v.abstract+'</p>' +
							'<div class="price-btn clear">' +
							'<a class="btnh" href="/details/'+v.id+'">查看详情</a>' +
							'</div>' +
							'</div>' +
							'</div>'

                    });
                    $(".container").html(html);
				}else{
                    layer.msg('系统错误', {
                        time: 2000, //20s后自动关闭
                    });
				}
            }
        });
    }
	{!! $site['statistical_code'] !!}
</script>


</body>
</html>