<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>{{ $site['title'] }}-首页</title>
		<meta name="keywords" content="{{ $site['keywords'] }}" />
		<meta name="description" content="{{ $site['description'] }}" />
		<link href="web/css/style.css" rel="stylesheet">
		<script src="web/js/jquery-1.8.3.min.js"></script>
		<script src="web/js/banner.js"></script>
		<script type="text/javascript" src="web/js/jquery.js"></script>
		<script type="text/javascript" src="web/js/jquery.num.js"></script>
		<script src="web/js/superslide.js"></script>
		<script>
            var host = '{{env('DOMAIN')}}';
            if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
                window.location.href = "http://m."+host;
            }
		</script>
		<script>
			$(function() {
				$(".eight-advantage-cont").slide({
					mainCell: ".slideHot ul",
					effect: "leftLoop",
					autoPage: true,
					autoPlay: true,
					scroll: 1,
					vis: 4,
					interTime: 3800
				});
				$("#ad-close").click(function() {
					$("#ad").hide();
				})
				$("#list-index li").click(function() {
					$(this).addClass("list-index-in").siblings("li").removeClass("list-index-in");
					$(this).append("<span></span>").siblings("li").find("span").remove();
					var index = ($("#list-index li").index(this)) + 1;
					$(".li-" + index).fadeIn();
					$(".add").not(".li-" + index).hide();
				});
				setTimeout(function() {
					$("#ad").fadeIn()
				}, 1000);
			})

			{!! $site['leyu'] !!}
		</script>

	</head>

	<body>
		<!--悬浮广告-->
		<div id="ad">
			@if(count($banner1))
			<a href="{{$banner1['url']}}"><img src="{{ env('IMG_URL').$banner1['banner'] }}"></a> <span id="ad-close"><img src="web/img/index-ad-close.png"></span> </div>
			@endif
		<!--悬浮广告 end-->
				<!--悬浮导航-->
		{{--<div id="right-menu">
			<ul>
				<li>
					<a href="">资质新办</a>
				</li>
				<li>
					<a href="">资质升级</a>
				</li>
				<li>
					<a href="">资质增项</a>
				</li>
				<li>
					<a href="">资质购买</a>
				</li>
				<li>
					<a href="">资质转让</a>
				</li>
			</ul>
		</div>--}}
		<!--悬浮导航 end-->
		<!--顶部-->
		<div class="wl100" id="top">
			<div class="content"><i><img src="web/img/hi.png"> </i>{{ $site['hello'] }}
				<ul>
					<li><img src="web/img/weixin.png">{{$site['weixin']}}</li>
					<li><img src="web/img/top-phone.png">{{ $site['about'] }}</li>
					<li><img src="web/img/kefu.png"> {{ $site['service'] }}</li>
				</ul>
			</div>
		</div>
		<!--顶部 end-->
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
		<!--全屏滚动-->
		<div class="banner">
			<div class="b-img">
				@foreach($banner as $item)
					<a href="{{$item['url']}}" style="background:url({{ env('IMG_URL').$item['banner'] }}) center no-repeat;"></a>
				@endforeach

			</div>
			<div class="b-list"></div>
			<a class="bar-left" href="#"><em></em></a>
			<a class="bar-right" href="#"><em></em></a>
		</div>
		<!--end 全屏滚动-->
		<div class="wl100">
			<div class="content" id="service-data">
				<ul>
					<li>成功办理服务：
						<span class="timer count-title" data-to="{{ $site['number1'] }}" data-speed="200">0</span><span>人</span>
					</li>
					<li>服务办理案件：<span class="timer count-title" data-to="{{ $site['number2'] }}" data-speed="200">0</span><span>件</span></li>
					<li>资质办理类型：<span class="timer count-title" data-to="{{ $site['number3'] }}" data-speed="200">0</span><span>+种</span></li>
				</ul>
			</div>
		</div>
		<!--四大类型-->
		<div class="wl100g">
			<div class="content">
				<!--大标-->
				<div class="title-h2">
					<h2>{{ $site['title1'] }}<span>{{ $site['title1_1'] }}</span></h2><img src="web/img/title-line.png">
					<p> {{ $site['title1_2'] }}</p>
				</div>
				<!--大标 end-->
				<div id="list-index">
					<ul>
						@foreach($type as $item)
							<li  @if ($loop->first)class="list-index-in" @endif><i><img src="{{ env('IMG_URL').$item['img'] }}"> </i>{{ $item['name'] }} @if ($loop->first)<span></span>@endif</li>
						@endforeach
						{{--<li class="list-index-in"><i><img src="web/img/list-icon-01.png"> </i>施工资质新办 <span></span></li>--}}
						{{--<li><i><img src="web/img/list-icon-02.png"> </i>资质增项升级延期</li>--}}
						{{--<li><i><img src="web/img/list-icon-03.png"> </i>房地产开发资质</li>--}}
						{{--<li><i><img src="web/img/list-icon-04.png"> </i>设计资质</li>--}}
					</ul>

				</div>
			</div>
		</div>
		<!--四大类型 end-->

		<div class="wl100">
			<div class="content" id="list-main">
				@foreach($type as $k=>$item)
				<div class="add li-{{$k+1}}">
					@foreach($item['son'] as $value)
					<div class="list-main-li">
						<div class="list-main-tit"><img src="{{env('IMG_URL').$value['img']}}">
							<p><b>{{$value['name']}} </b><br></br>{{ $value['abstract'] }}</p>
						</div>
						<ul>
							@foreach($value['product'] as $v)
							<li>
								{{--<a href="/details/{{$v['id']}}">{{$v['tag']}}</a>--}}
								<a href="/product">{{$v['tag']}}</a>
							</li>

							@endforeach
								<li>
									<a href="/product">更多热门服务</a>
								</li>
						</ul>
					</div>
					@endforeach

				</div>
				@endforeach
				{{--<div class="add li-2">
					<div class="list-main-li">
						<div class="list-main-tit"><img src="web/img/icon-01.png">
							<p><b>建筑资质项目 2222222222</b><br></br>全类目资质代办</p>
						</div>
						<ul>
							<li>
								<a href="">新办、升级、增项</a>
							</li>
							<li>
								<a href="">建筑劳务资质</a>
							</li>
							<li>
								<a href="">总承包资质</a>
							</li>
							<li>
								<a href="">专业承包资质</a>
							</li>
							<li>
								<a href="">设计资质</a>
							</li>
							<li>
								<a href="">入川备案</a>
							</li>
							<li>
								<a href="">各类安许</a>
							</li>
							<li>
								<a href="">内容确定。。。</a>
							</li>
						</ul>
					</div>
					<div class="list-main-li">
						<div class="list-main-tit"><img src="web/img/icon-02.png">
							<p><b>总承包资质 </b><br></br>全类目承包资质</p>
						</div>
						<ul>
							<li>
								<a href="">建筑工程施工</a>
							</li>
							<li>
								<a href="">公路工程施工</a>
							</li>
							<li>
								<a href="">机电工程施工</a>
							</li>
							<li>
								<a href="">电力工程施工</a>
							</li>
							<li>
								<a href="">通信工程施工</a>
							</li>
							<li>
								<a href="">房屋工程施工</a>
							</li>
							<li>
								<a href="">市政公用工程施工</a>
							</li>
							<li>
								<a href="">水利水电工程施工</a>
							</li>
						</ul>
					</div>
					<div class="list-main-li list-main-last">
						<div class="list-main-tit"><img src="web/img/icon-03.png">
							<p><b>专业承包资质</b><br></br>全类目承包资质</p>
						</div>
						<ul>
							<li>
								<a href="">装修装饰工程</a>
							</li>
							<li>
								<a href="">建筑幕墙工程</a>
							</li>
							<li>
								<a href="">机电安装工程</a>
							</li>
							<li>
								<a href="">地基基础工程</a>
							</li>
							<li>
								<a href="">电子与智能化工程</a>
							</li>
							<li>
								<a href="">防水防腐保温工程</a>
							</li>
							<li>
								<a href="">钢结构工程</a>
							</li>
							<li>
								<a href="">城市及道路照明工程</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="li-3 add">
					<div class="list-main-li">
						<div class="list-main-tit"><img src="web/img/icon-01.png">
							<p><b>建筑资质项目 33333333</b><br></br>全类目资质代办</p>
						</div>
						<ul>
							<li>
								<a href="">新办、升级、增项</a>
							</li>
							<li>
								<a href="">建筑劳务资质</a>
							</li>
							<li>
								<a href="">总承包资质</a>
							</li>
							<li>
								<a href="">专业承包资质</a>
							</li>
							<li>
								<a href="">设计资质</a>
							</li>
							<li>
								<a href="">入川备案</a>
							</li>
							<li>
								<a href="">各类安许</a>
							</li>
							<li>
								<a href="">内容确定。。。</a>
							</li>
						</ul>
					</div>
					<div class="list-main-li">
						<div class="list-main-tit"><img src="web/img/icon-02.png">
							<p><b>总承包资质 </b><br></br>全类目承包资质</p>
						</div>
						<ul>
							<li>
								<a href="">建筑工程施工</a>
							</li>
							<li>
								<a href="">公路工程施工</a>
							</li>
							<li>
								<a href="">机电工程施工</a>
							</li>
							<li>
								<a href="">电力工程施工</a>
							</li>
							<li>
								<a href="">通信工程施工</a>
							</li>
							<li>
								<a href="">房屋工程施工</a>
							</li>
							<li>
								<a href="">市政公用工程施工</a>
							</li>
							<li>
								<a href="">水利水电工程施工</a>
							</li>
						</ul>
					</div>
					<div class="list-main-li list-main-last">
						<div class="list-main-tit"><img src="web/img/icon-03.png">
							<p><b>专业承包资质</b><br></br>全类目承包资质</p>
						</div>
						<ul>
							<li>
								<a href="">装修装饰工程</a>
							</li>
							<li>
								<a href="">建筑幕墙工程</a>
							</li>
							<li>
								<a href="">机电安装工程</a>
							</li>
							<li>
								<a href="">地基基础工程</a>
							</li>
							<li>
								<a href="">电子与智能化工程</a>
							</li>
							<li>
								<a href="">防水防腐保温工程</a>
							</li>
							<li>
								<a href="">钢结构工程</a>
							</li>
							<li>
								<a href="">城市及道路照明工程</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="li-4 add">
					<div class="list-main-li">
						<div class="list-main-tit"><img src="web/img/icon-01.png">
							<p><b>建筑资质项目 44444</b><br></br>全类目资质代办</p>
						</div>
						<ul>
							<li>
								<a href="">新办、升级、增项</a>
							</li>
							<li>
								<a href="">建筑劳务资质</a>
							</li>
							<li>
								<a href="">总承包资质</a>
							</li>
							<li>
								<a href="">专业承包资质</a>
							</li>
							<li>
								<a href="">设计资质</a>
							</li>
							<li>
								<a href="">入川备案</a>
							</li>
							<li>
								<a href="">各类安许</a>
							</li>
							<li>
								<a href="">内容确定。。。</a>
							</li>
						</ul>
					</div>
					<div class="list-main-li">
						<div class="list-main-tit"><img src="web/img/icon-02.png">
							<p><b>总承包资质 </b><br></br>全类目承包资质</p>
						</div>
						<ul>
							<li>
								<a href="">建筑工程施工</a>
							</li>
							<li>
								<a href="">公路工程施工</a>
							</li>
							<li>
								<a href="">机电工程施工</a>
							</li>
							<li>
								<a href="">电力工程施工</a>
							</li>
							<li>
								<a href="">通信工程施工</a>
							</li>
							<li>
								<a href="">房屋工程施工</a>
							</li>
							<li>
								<a href="">市政公用工程施工</a>
							</li>
							<li>
								<a href="">水利水电工程施工</a>
							</li>
						</ul>
					</div>
					<div class="list-main-li list-main-last">
						<div class="list-main-tit"><img src="web/img/icon-03.png">
							<p><b>专业承包资质</b><br></br>全类目承包资质</p>
						</div>
						<ul>
							<li>
								<a href="">装修装饰工程</a>
							</li>
							<li>
								<a href="">建筑幕墙工程</a>
							</li>
							<li>
								<a href="">机电安装工程</a>
							</li>
							<li>
								<a href="">地基基础工程</a>
							</li>
							<li>
								<a href="">电子与智能化工程</a>
							</li>
							<li>
								<a href="">防水防腐保温工程</a>
							</li>
							<li>
								<a href="">钢结构工程</a>
							</li>
							<li>
								<a href="">城市及道路照明工程</a>
							</li>
						</ul>
					</div>
				</div>--}}
				<!-咨询电话通用-->
				<div class="telpne">
					<a >{{$site['mobile']}}</a>
				</div>
				<!-咨询电话通用-->
			</div>
		</div>

		<!--四大类型 end-->

		<div class="wl100b">
			<div class="content">
				<!--大标-->
				<div class="title-h2">
					<h2>{{$site['title2']}}</h2><img src="web/img/title-line.png">
					<p>{{$site['title2_1']}}</p>
				</div>
				<!--大标 end-->
				<!--全方位为您服务-->
				<div class="in_lc" >
					<div>
						@foreach($process as $k=>$item)
							<div>
								<div class="circle"  @if($loop->last) style="margin-right: 0;" @endif><i @if($k==0)@elseif($k==1)class="qyht"@elseif($k==2)class="ymsj"@elseif($k==3) class="cxkf" @elseif($k==4) class="shys"@endif></i></div>
								<u>0{{($k+1)}}</u>
								<h3>{{ $item['title'] }}</h3>
								<p>{{ $item['content'] }}</p>
							</div>
						@endforeach

						{{--<div>
							<div class="circle"><i class="qyht"></i></div>
							<u>02</u>
							<h3>面谈签约</h3>
							<p>根据您的需求，客户专员会制定一套详细的服务方案</p>
						</div>
						<div>
							<div class="circle"><i class="ymsj"></i></div>
							<u>03</u>
							<h3>资质整理</h3>
							<p>进度专员、材料专员、 外勤人员为您 办理相关事宜
							</p>
						</div>
						<div>
							<div class="circle"><i class="cxkf"></i></div>
							<u>04</u>
							<h3>提交办理</h3>
							<p>如果您对我们的方案和服务认可，进行洽谈合同事宜
							</p>
						</div>
						<div style="margin-right: 0;">
							<div class="circle"><i class="shys"></i></div>
							<u>05</u>
							<h3>快速领证</h3>
							<p>双方对合同和条款都没 有异议，确认签单
							</p>
						</div>--}}

					</div>
				</div>
			</div>
		</div>
		<!--常见问题-->
		<div class="wl100">
			<div class="content">
				<!--大标-->
				<div class="title-h2">
					<h2>{{$site['title3']}}<span>{{$site['title3_1']}}</span></h2><img src="web/img/title-line.png">
					<p> {{$site['title3_2']}}</p>
				</div>
				<!--大标 end-->
				<ul id="question">
					@foreach($answer as $item)
						<li><span><img src="web/img/question.png"> {{$item['question']}}</span>
							<a class="shangqiao" href="javascript:void(0);" rel="nofollow">立即咨询</a>
						</li>
					@endforeach

				</ul>


<!--大标-->
<div class="title-h2">
	<h2>成功案例<span>实力保证</span></h2><img src="web/img/title-line.png">
	<p> SUCCESSFUL CASES, STRENGTH ASSURANCE</p>
</div>
<!--大标 end-->
				<div class="big-gray">
					<div class="eight-advantage-cont w1180">
						<div class="slideHot">
							<ul>
								@foreach($rolling as $item)
									<li>
										<div class="img-box">
											<span class="md"></span>
											<div class="dib">
												<img src="{{env('IMG_URL').$item['img']}}" alt="{{$item['name']}}" />
											</div>
										</div>
										<p>{{$item['name']}}</p>
									</li>
								@endforeach


							</ul>
						</div>
						<a href="javascript:void(0)" class="change-btn prev"></a>
						<a href="javascript:void(0)" class="change-btn next"></a>
					</div>
				</div>
				<!-咨询电话通用-->
				<div class="telpne">
					<a>{{$site['mobile']}}</a>
				</div>
				<!-咨询电话通用-->
			</div>
		</div>
		<!--常见问题-->
		<!--合作单位-->
		<div class="wl100g">
			<div class="content">
				<!--大标-->
				<div class="title-h2">
					<h2>{{$site['title4']}}</h2><img src="web/img/title-line.png">
				</div>
				<!--大标 end-->
				<div id="cooperation">
					@foreach($institution as $item)
						<a href="{{$item['url']}}"><img src="{{env('IMG_URL').$item['img']}}"> </a>
					@endforeach
				</div>
			</div>
		</div>

		<!--合作单位 end-->
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
<!--底部-->
<div id="btm_fl">
    <div id="btm_fl_main">
        <div id="btm_fl_main_left"><i></i>蜀创建筑官网唯一客户服务热线：<b>400-888-8888</b></div>
       <!-- <font><img src="images/btm_close.png"></font>-->
        <div id="btm_fl_main_right">
		<form >
            <div class="error1">错误信息提示</div>
            <input class="phonex6" id="phonex6" name="phone1" type="text" onKeyUp="this.value=this.value.replace(/\D/g,'')" maxlength="11" placeholder="请输入您的电话号码"
                   onFocus="this.value=''" onBlur="if(!value){value=defaultValue;}">
            <input value="免费咨询" type="button" id="bt7"   class="tijiaox6">

		</form>
        </div>
    </div>
</div>
<!--底部end-->

<script>

	$(function(){
		// 点击按钮时判断 百度商桥代码中的“我要咨询”按钮的元素是否存在，存在的话就执行一次点击事件
		$(".shangqiao").click(function(event) {
			if ($('#nb_invite_ok').length > 0) {
				$('#nb_invite_ok').click();
			}
		});
	});

$(document).ready(function () {
      setTimeout(function () {
            $("#btm_fl").slideDown(1000)
        }, 3000);

        $("#btm_fl font").click(function () {
            $("#btm_fl").slideUp(1000);
        })

    function checkPhonex6() {
        reg =/^1[3|4|5|7|8][0-9]\d{8}$/i;//验证手机正则(输入前7位至11位)
        if ($(".phonex6").val() == "" || $(".phonex6").val() == "请输入您的电话号码") {
            $(".phonex6").prev('.error1').html('手机号不能为空').show();
            //表单不提交
            return false;
        }
        if (!reg.test($(".phonex6").val())) {

            $(".phonex6").prev('.error1').html('手机号有误').show();
            //表单不提交
            return false;
        }
        else{

            $(".phonex6").prev('.error1').hide();
            return true;}
    }
    //手机号栏失去焦点
    $(".tijiaox6").click(function () {
        if(checkPhonex6()===false){
            return false;
        }

        var mobile = $('#phonex6').val();
        $.ajax({
            type: 'POST',
            url: "{{route('getMobile')}}",
            data: {'_token': '{{ csrf_token() }}',phone:mobile},
            success: function (res) {
                alert(res.msg)
                if(res.code===0){

                    layer.msg(res.msg, {
                        time: 2000, //20s后自动关闭
                    });
				}else{
                    layer.msg('提交失败', {
                        time: 2000, //20s后自动关闭
                    });
				}

            }
        });

    });


});

	{!! $site['statistical_code'] !!}
		</script>


	</body>

</html>