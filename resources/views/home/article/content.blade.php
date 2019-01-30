<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>筑小邦-{{ $new['title'] }}</title>
    <meta name="keywords" content="{{ $new['keywords'] }}" />
    <meta name="description" content="{{ $new['description'] }}" />
    <link href="/web/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/web/css/main.css"/>
    <link rel="stylesheet" href="/web/css/all-sever.css"/>
    <script src="/web/js/jquery-1.8.3.min.js"></script>
    <script>
        var host = '{{env('DOMAIN')}}';
        if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
            window.location.href = "http://m."+host;
        }
        {!! $site['leyu'] !!}
    </script>

</head>
<body>

<!--导航-->
<div class="wl100">
    <div class="content"><span><img src="{{ env('IMG_URL') .$site['logo'] }}"></span>
        <div id="top-right"><div id="top-right-phone"><img src="/web/img/24phone.png">免费热线：<b>{{$site['mobile']}}</b></div>
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
        <div class="dib cont">
            <a href="/" class="dib">首页</a>
            <a href="{{route('new')}}" class="dib">公司新闻</a>
            <span class="dib">内容详情</span>
        </div>
    </div>
    <div class="news-show">
        <div class="news-details">
            <div class="details">
                <h5>{{$new->title}}</h5>
                <label><font>{{$new->created_at}}</font>
                    <font>来源：{{$new->editor}}</font>
                    <font>浏览：1258</font>
                    <font>咨询电话：{{$site['mobile']}}</font>
                </label>
                <div class="details-bd">
                    {!! $new->content !!}
                </div>

            </div>
        </div>
    </div>
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
            <div class="fot-right"><img src="/web/img/24.png">24小时服务热线：
                <h4>{{ $site['mobile'] }}</h4></div>
        </div>
    </footer>
    <!--底部 end-->

</body>
<script>
    $(function() {
        $(".down").find(".btnh").click(function() {
            var text = $(this).parents(".down").find(".down-p1").text();
            $("#order-mask").fadeIn();
            $("#order-mask").find("em").text(text)
        })
        $("#order-mask i").click(function() {
            $("#order-mask").fadeOut();
            $('#order-main ul').find("input").val("");
        })
    })
</script>

</html>