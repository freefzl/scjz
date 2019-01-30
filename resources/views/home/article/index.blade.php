<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>筑小邦-{{ $site['title'] }}</title>
    <meta name="keywords" content="{{ $site['keywords'] }}" />
    <meta name="description" content="{{ $site['description'] }}" />
    <link href="web/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="web/css/main.css"/>
    <link rel="stylesheet" href="web/css/all-sever.css"/>
    <script src="web/js/jquery-1.8.3.min.js"></script>
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
        <div class="dib cont">
            <a href="/" class="dib">首页</a>
            <span class="dib">公司新闻</span>
        </div>
    </div>
    <div class="all-sever-page w1200">
        <div id="news-main">
            @foreach($new as $item)
            <dl>
                <dd><a href="/content/{{$item->id}}"><img src="{{env('IMG_URL').$item->thumb}}"></a></dd>
                <dt><h5>{{$item->title}}</h5>
                    <p>{{$item->description}}<a href="/content/{{$item->id}}">查看详情</a>
                    </p>
                    <time>{{$item->created_at}}</time>
                </dt>
            </dl>

             @endforeach
                {{ $new->links() }}
        </div>
        <div class="fr">
            <div class="fr-box">
                <h4 class="tt-h4">公司新闻</h4>
                <div class="story-list">
                    @foreach($news as $item)
                    <a href="/content/{{$item->id}}" class="">{{$item->title}}</a>
                        @endforeach
                </div>
            </div>
        </div>
        <div class="fr">
            <div class="fr-box">
                <h4 class="tt-h4">业务百科</h4>
                <div class="story-list">
                    @foreach($business as $item)
                        <a href="/content/{{$item->id}}" class="">{{$item->title}}</a>
                    @endforeach
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
            <div class="fot-right"><img src="web/img/24.png">24小时服务热线：
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