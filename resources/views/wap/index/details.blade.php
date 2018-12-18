<!DOCTYPE html>
<html>

	<head>
		<title>{{ $site['title'] }}-列表内容</title>
		<meta name="keywords" content="{{ $site['keywords'] }}" />
		<meta name="description" content="{{ $site['description'] }}" />
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
		<meta content="yes" name="apple-mobile-web-app-capable">
		<meta content="yes" name="apple-touch-fullscreen">
		<meta content="telephone=no,email=no" name="format-detection">
		<meta charset="UTF-8">
		<link href="/wap/css/main.css" rel="stylesheet">
		{{--<link href="/web/js/mobile/need/layer.css" rel="stylesheet">--}}
		<script src="/wap/js/jquery-1.8.3.min.js"></script>
		<script src="/web/js/mobile/layer.js"></script>

	</head>

	<body class="bg-f5">

		<section>
			<!--菜单列表-->

			<div class="list-top">
				<div class="list-top-box">
					<div class="header_top">
						<a href="#list-comoditbox" class="current">商品</a>
						<a href="#list-main-detailsbox">保障</a>
						<a href="#list-evaluate">问答</a>
					</div>

				</div>
			</div>
			<!--菜单列表end-->
			<!--菜单详情-->
			<div class="list-main-content">
				<div id="list-comoditbox">
					<div class="list-main-banner">
						<img src="{{env('IMG_URL').$product['img']}}" width="100%" height="100%" />
					</div>
					<div class="list-main-info">
						<div class="list-info-price">
							{{--价格：<span>￥1.00</span>--}}
						</div>
						<div class="list-info-title">
							<span>{{$product['title']}}</span> {{$product['tag']}}
						</div>
						<div class="list-info-subtit">
							{{$product['abstract']}}
						</div>
					</div>
				</div>
				<!-- shangpingbufen -->
				<div id="list-main-detailsbox">
					<div class="list-detailstit">服务详情</div>
					<div class="list-detailsimg">
						<p>{!! $product['introduce'] !!}</p>
					</div>
				</div>
				<!-- fuwujieshaobufen -->
				<div id="list-evaluate">
					<div class="list-detailstit">热门问答</div>
					<div class="list-detailsimg">
						<ul class="qa">
							@foreach($answer as $item)
								<li>
									<p>Q : {{ $item['question'] }}</p>
									<b>A : {{ $item['answer'] }}</b>
								</li>
							@endforeach

						</ul>
					</div>
				</div>

			</div>
			<!--菜单详情 end-->
			<!--底部导航-->
			<div class="list-footer">
				<ul>
					<li>
						<div class="list-footer-icon">
							<a href="/"><img src="/wap/images/ft-sy.png" /><br>首页</a>
						</div>
						<div class="list-footer-icon">
							<a href=""><img src="/wap/images/ft-zx.png" /><br>咨询</a>
						</div>
					</li>
					<li>
						<div class="iwantbuy">
							<div class="buybutton">立即购买</div>
							
						</div>
					</li>
				</ul>
			</div>
			<!--<footer>
					<ul>
						<li><img src="/wap/images/ft-sy1.png" /><br>首页</li>
						<li><img src="/wap/images/ft-fl.png" /><br>分类</li>
						<li><img src="/wap/images/ft-zx.png" /><br>咨询</li>
					</ul>
				</footer>-->
			<!--底部导航end-->

		</section>
		<div id="Popup">
			<div id="Popup-box">
				<h3>请填写以下信息</h3><span onclick="closed()"><img src="/wap/images/closed.png">关闭</span>
				<ul>


						<li><input name="name" id="name" value="" maxlength="5" placeholder="姓名" type="text">
							<p class="error" style="color: red"></p>
						</li>
						<li><input name="phone" id="phone" value="" maxlength="11" placeholder="联系电话" type="text">
							<p class="error1" style="color: red"></p>
						</li>

						<li><input type="button" id="submit" value="立即提交" ></li>

				</ul>
			</div>
		</div>
		<script>


            //错误提示
			@if(count($errors)>0)
			@foreach($errors->all() as $error)
            layer.msg("{{$error}}",{icon:5});
			@break
			@endforeach
			@endif

			$(function() {
				
				$('.header_top>a').click(function() {
					$(this).siblings().removeClass('current');
					$(this).addClass('current');
				})
			$(".buybutton").click(function(){
				$("#Popup").fadeIn();
				$("body").css("overflow","hidden")
			})
			})
			function closed(){
				$("#Popup").fadeOut();
				
			}

            function checkPhonex6() {
                reg =/^1[3|4|5|7|8][0-9]\d{8}$/i;//验证手机正则(输入前7位至11位)

                if ($("#phone").val() == "") {

                    $(".error1").html('手机号不能为空').show();
                    //表单不提交
                    return false;
                }
                if (!reg.test($("#phone").val())) {

                    $(".error1").html('手机号有误').show();
                    //表单不提交
                    return false;
                }
                else{
                    $(".error1").hide();
                    return true;
                }
            }
            function checkname() {
                if ($("#name").val() == "") {

                    $(".error").html('姓名不能为空').show();
                    //表单不提交
                    return false;
                }
                else{
                    $(".error").hide();

                    return true;
                }
            }

            $("#submit").click(function () {
                if(checkname()===false){
                    return false;
                }
                if(checkPhonex6()===false){
                    return false;
                }

                var mobile = $('#phone').val();
                var name = $('#name').val();
                $.ajax({
                    type: 'POST',
                    url: "{{route('postData')}}",
                    data: {'_token': '{{ csrf_token() }}',name:name,phone:mobile},
                    success: function (res) {

                        if(res.code===0){
                            alert(res.msg)
                            closed();
                            layer.msg(res.msg);

                        }else{
                            alert(res.msg)
                            closed();
                            layer.msg(res.msg);

                        }

                    }
                });

            });
            var host = '{{env('DOMAIN')}}';
            if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {

            }else{
                window.location.href = "http://pc."+host;
            }
			{!! $site['statistical_code'] !!}
		</script>

	</body>

</html>