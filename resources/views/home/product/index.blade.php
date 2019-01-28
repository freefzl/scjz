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
<script>
    var host = '{{env('DOMAIN')}}';
    if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
        window.location.href = "http://m."+host;
    }

	{{--{!! $site['leyu'] !!}--}}
</script>
<body>
<!--导航-->
	<!--预约-->
		<div id="order-mask">
			<div id="order">
				<div id="order-main"><i></i>



					<h3>专业服务，在线咨询</h3>

						<ul>

							<li><span>预约办理：</span><em id="appointment">市政公用工程施工总承包资质</em></li>
							<li><span>您的称呼：</span><input type="text" name="name" id="name" value="" placeholder=""></li>
							<li><span>联系方式：</span><div class="error2">错误信息提示</div><input type="text" maxlength="11" name="phone" id="phone" value="" placeholder=""></li>
							<li><span>回访时间：</span><select name="visit_time" id="visit_time">
								<option>请选择</option>
								<option>立即联系</option>
								<option>工作日联系</option>
								<option>休息日联系</option>
							</select></li>
							<li><span>验证码：</span><input type="text" name="code" id="code" value="" placeholder=""><img src="{{captcha_src()}}" style="  margin-left: 240px;margin-top: -64px;" onclick="this.src='{{captcha_src()}}'+Math.random()">
							</li>
						</ul>
						<input type="button" id="submitData" value="立即提交" />

				</div>
			</div>
		</div>
		<!--预约end-->
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
							<a class="dib " href="javascript:;" onclick="getData(this,'{{$value['id']}}')">{{ $value['name'] }}</a>
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
						<a href="javascript:;"><img src="{{env('IMG_URL').$item['img']}}"
										 title="{{$item['title']}}" alt="{{$item['title']}}"/></a>
					</div>
					<div class="down">
						<h3 class="down-p1">{{$item['title']}} </h3>
						<p class="down-p2 text-overflow2">{{$item['abstract']}}</p>
						<div class="price-btn clear">
							<button class="shangqiao" href="{{$site['leyu_url']}}" rel="nofollow">在线咨询</button>
							<a class="btnh" >立即申请</a>
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


	@if($errors->has('captcha'))
		@foreach($errors->all() as $error)
			alert("{{ $errors->first('code') }}");
			@break
		@endforeach
	@endif

	function getData(obj,id) {
	    var img_url = '{{env('IMG_URL')}}';
	    var leyu_url = '{{$site['leyu_url']}}';

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
							'<a href="javascript:;"><img src="'+img_url+v.img+'" title="'+v.title+'" alt="'+v.title+'"/></a>' +
							'</div>' +
							'<div class="down">' +
							'<h3 class="down-p1">'+v.title+' </h3>' +
							'<p class="down-p2 text-overflow2">'+v.abstract+'</p>' +
							'<div class="price-btn clear">' +
							'<button class="shangqiao" href="'+leyu_url+'" rel="nofollow">在线咨询</button>' +
							// '<a class="btnh" href="/details/'+v.id+'">查看详情</a>' +
							'<a class="btnh" href="javascript:;">立即申请</a>' +
							'</div>' +
							'</div>' +
							'</div>'



                    });
                    $(".container").html(html);

					$(function(){
						// 点击按钮时判断 百度商桥代码中的“我要咨询”按钮的元素是否存在，存在的话就执行一次点击事件
						$(".shangqiao").click(function(event) {
							if ($('#nb_invite_ok').length > 0) {
								$('#nb_invite_ok').click();
							}
						});
					});
					$(function(){
						$(".down").find(".btnh").click(function(){
							var text= $(this).parents(".down").find(".down-p1").text();
							$("#order-mask").fadeIn();
							$("#order-mask").find("em").text(text)
						})
						$("#order-mask i").click(function(){
							$("#order-mask").fadeOut();
							$('#order-main ul').find("input").val("");
						})
					})
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
<script>
	$(function(){
		// 点击按钮时判断 百度商桥代码中的“我要咨询”按钮的元素是否存在，存在的话就执行一次点击事件
		$(".shangqiao").click(function(event) {
			if ($('#nb_invite_ok').length > 0) {
				$('#nb_invite_ok').click();
			}
		});
	});
	$(function(){
		$(".down").find(".btnh").click(function(){
			var text= $(this).parents(".down").find(".down-p1").text();
			$("#order-mask").fadeIn();
			$("#order-mask").find("em").text(text)
		})
		$("#order-mask i").click(function(){
			$("#order-mask").fadeOut();
			$('#order-main ul').find("input").val("");
		})
	})

	function checkPhonex6() {
		reg =/^1[3|4|5|7|8][0-9]\d{8}$/i;//验证手机正则(输入前7位至11位)
		if ($("#phone").val() == "" || $("#phone").val() == "请输入您的电话号码") {
			$("#phone").prev('.error2').html('手机号不能为空').show();
			//表单不提交
			return false;
		}
		if (!reg.test($("#phone").val())) {

			$("#phone").prev('.error2').html('手机号有误').show();
			//表单不提交
			return false;
		}
		else{

			$("#phone").prev('.error2').hide();
			return true;}
	}


	$('#submitData').click(function () {

		if(checkPhonex6()===false){
			return false;
		}

		var appointment= $('#appointment').text();
		var name= $('#name').val();
		var phone= $('#phone').val();
		var visit_time= $('#visit_time').val();
		var code= $('#code').val();
		$.ajax({
			type: 'POST',
			url: "{{route('getMobile')}}",
			data: {'_token': '{{ csrf_token() }}',phone:phone,name:name,appointment:appointment,visit_time:visit_time,code:code},
			success: function (res) {
				alert(res.msg)
				$('#order-mask').hide();
				if(res.code===0){

					layer.msg(res.msg, {
						time: 2000, //20s后自动关闭
					});
				}else{
					layer.msg('提交失败', {
						time: 2000, //20s后自动关闭
					});
				}

			},
			error : function (XMLHttpRequest, textStatus, errorThrow ) {
				alert('验证码错误')

				responseObject = {status:false,message:'请求失败'};
			},
		});
	})
</script>

</body>
</html>