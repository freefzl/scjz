<!DOCTYPE html>
<html>

<head>
    <title>{{ $site['title'] }}-首页</title>
    <meta name="keywords" content="{{ $site['keywords'] }}" />
    <meta name="description" content="{{ $site['description'] }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="telephone=no,email=no" name="format-detection">
    <meta charset="UTF-8">
    <script src="wap/js/jquery-1.8.3.min.js"></script>
    <script src="wap/js/banner.js"></script>
    <link href="wap/css/main.css" rel="stylesheet">

</head>

<body style="background: #f5f5f5;">
<!--顶部-->
<div class="white-bg">
    <div id="top">
        <div id="logo"><img src="{{env('IMG_URL').$site['logo']}}"></div>
        <div id="top-phone"><img src="wap/images/24.png">免费热线
            <h3>{{$site['mobile']}}</h3></div>
    </div>
    <!--顶部 end-->
    <!--全屏滚动-->
    <div class="banner">
        <div class="b-img" style="height: 120vmin;">
            @foreach($banner as $item)
                <a  href="{{$item['url']}}" style="background:url({{ env('IMG_URL').$item['banner'] }}) center no-repeat;width:100%;height:40%;background-size:100%100%;"></a>
            @endforeach
        </div>	</div>
    <!--end 全屏滚动-->
    <!--服务数据-->

    <ul class="fwsj">
        <li><p>{{$site['number1']}}<sup>+</sup><span>人</span></p>成功办理服务</li>
        <li><p>{{$site['number2']}}<sup>+</sup><span>件</span></p>服务办理案件</li>
        <li><p>{{$site['number3']}}<sup>+</sup><span>种</span></p>服务办理种类</li>
    </ul>

    <!--服务数据 end-->

</div>
<!--大标-->
<div class="title-h2">
    <h2>{{$site['title1']}}<span>{{$site['title1_1']}}</span></h2>
</div>
<!--大标 end-->
<!--资质服务一站到位-->
<div class="white-bg">
    <ul id="zzfw">
        @foreach($type as $k=>$item)
            <a href="/class"><li><img @if($k==0)src="wap/images/img1.png"@elseif($k==1)src="wap/images/img2.png"@elseif($k==2)src="wap/images/img3.png"@elseif($k==3)src="wap/images/img4.png"@endif ><h5>{{$item['name']}}</h5><p>{{$item['abstract']}}</p></li></a>
            @endforeach

        {{--<li><img src="wap/images/img2.png"><h5>设计资质</h5><p>承担资质证书许可范围内的工程设计业务</p></li>
        <li><img src="wap/images/img3.png"><h5>独立资质</h5><p>各类型企业如果要进行房地产开发等需要进行资质审核</p></li>
        <li><img src="wap/images/img4.png"><h5>资质增项升级</h5><p>申请晋升资质等级或主项资质以外的资质</p></li>--}}
    </ul>
</div>
<!--资质服务一站到位 end-->

<!--超200种资质代办-->

<div class="white-bg mt5"><!--大标-->
    <div class="title-h2">
        <h2>超<span>{{ $site['number3'] }}种</span>资质证书代办</h2>
    </div>
    <!--大标 end-->
    <ul id="zzzs">
        @foreach($product as $item)
        <li><img src="{{ env('IMG_URL').$item['img'] }}"><br>{{$item['tag']}}<button></button></li>
        @endforeach
        {{--<li><img src="wap/images/icon.png"><br>建筑工程施工<button></button></li>
        <li><img src="wap/images/icon.png"><br>建筑工程施工<button></button></li>
        <li><img src="wap/images/icon.png"><br>建筑工程施工<button></button></li>
        <li><img src="wap/images/icon.png"><br>建筑工程施工<button></button></li>
        <li><img src="wap/images/icon.png"><br>建筑工程施工<button></button></li>
        <li><img src="wap/images/icon.png"><br>建筑工程施工<button></button></li>
        <li><img src="wap/images/icon.png"><br>建筑工程施工<button></button></li>--}}
    </ul>
</div><!--超200种资质代办end-->
<!--大标-->
<div class="title-h2">
    <h2>{{$site['title2']}}</h2>
</div>
<!--大标 end-->
<!--全方位为您服务-->
<div class="in_lc">
    <ul>
        @foreach($process as $k=>$item)
        <li><img @if($k==0)src="wap/images/yuyue.png"@elseif($k==1)src="wap/images/zhengli.png"@elseif($k==2)src="wap/images/tijiao.png"@elseif($k==3)src="wap/images/lingzheng.png"@elseif($k==4)src="wap/images/lingzheng.png"@endif ><br>{{ $item['title'] }}</li>
        @endforeach
        {{--<li><img src="wap/images/zhengli.png"><br>资料整理</li>--}}
        {{--<li><img src="wap/images/tijiao.png"><br>提交办理</li>--}}
        {{--<li><img src="wap/images/lingzheng.png"><br>快速领证</li>--}}
        {{--<li><img src="wap/images/lingzheng.png"><br>快速领证</li>--}}
    </ul>

</div>
</div>
<!--全方位为您服务end-->
<!--咨询电话通用-->
<a><div class="telpne">
        {{$site['mobile']}}
    </div></a>
<!--咨询电话通用-->

<div class="white-bg">	<!--大标-->
    <div class="title-h2">
        <h2>你想了解的<span>我们都知道</span></h2>
    </div>
    <!--大标 end--><ul id="question">
        @foreach($answer as $item)
            <li><span><img src="web/img/question.png"> {{$item['question']}}</span>
                <a href="/">立即咨询</a>
            </li>
        @endforeach
    </ul></div>
<div id="foot" style="margin-bottom: 50px"><p> {{$site['copyright']}}</p>
    <!--底部导航-->
    <footer>
        <ul>
            <a href="/"><li><img src="wap/images/ft-sy1.png" /><br>首页</li></a>
            <a href="/class"><li><img src="wap/images/ft-fl.png" /><br>分类</li></a>
            <a href=""><li><img src="wap/images/ft-zx.png" /><br>咨询</li></a>
        </ul>
    </footer>
    <!--底部导航end-->
</div>

<script>
    var host = '{{env('DOMAIN')}}';
    if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {

    }else{
        window.location.href = "http://www."+host;
    }

    {!! $site['statistical_code'] !!}
</script>
</body>

</html>