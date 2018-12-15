<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $site['title'] }}-内容详情</title>
    <meta name="keywords" content="{{ $site['keywords'] }}" />
    <meta name="description" content="{{ $site['description'] }}" />
    <script src="/web/js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" href="/web/css/productshow.css">
    <link href="/web/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/web/css/all-sever.css"/>
    <link rel="stylesheet" href="/web/css/main_1.css"/>
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
<div class="page-content">
    <div class="productShow">
        <div class="localtion"></div>
        <div class="product">
            <div class="tu">
                <img src="{{env('IMG_URL').$details['img']}}" width="520" alt="{{$details['title']}}"
                     title="{{$details['title']}}">
            </div>
            <div class="productInfo">
                <h1>{{$details['title']}}</h1>
                <p>{{$details['abstract']}}</p>
                {{--<div class="price">
                    <p>价 格： <span id="goodsPrice">1.00 <b>元</b></span><i id="tip_msg">1元急速响应，具体办理价格面议</i></p>
                </div>--}}
                <input type="hidden" id="goodsId" value="240">

                {{--<form action="/home/cart/cart2.html" method="post" id="goodsForm">--}}
                    {{--<div class="num">
                        <dl>
                            <dt>数量</dt>
                            <dd>
                                <b onclick="controlNum(-1,this)">-</b><input name="goods_num" readonly="readonly"
                                                                             type="text" value="1"><b
                                    onclick="controlNum(1, this)">+</b>
                            </dd>
                        </dl>
                    </div>--}}
                    <div class="btn">
                        <input type="hidden" id="item_id" name="item_id" value="84727">
                        <input type="hidden" id="goods_id" name="goods_id" value="240">
                        <input type="hidden" name="city_id" id="city_id" value="47500">
                        <input type="hidden" name="action" value="buy_now">
                        <input type="hidden" id="check_submit" value="1">
                        <button type="button" id="submitBtn" class="atthis btn01">立即办理</button>
                        <a href="javascript:;"
                           target="_blank">在线咨询</a>

                    </div>
                {{--</form>--}}
                <p class="tips" style="margin-top:22px">服务承诺：{{$details['commitment']}}</p>
                {{--<p class="xy">在您购买顶呱呱提供的服务前，请务必仔细阅读<a href="/articleDetail/106.html" class="agree" target="_blank">《一站式企业服务平台服务协议》</a>--}}
                </p>
            </div>
            <div class="clear"></div>
        </div>

        <div class="tj mt30">
            <div class="tab-catalog-02"><a class="atthis" href="javascript:void(0);">您可能需要的套餐</a></div>
            <ul>
                @foreach($random as $item)

                    <li class="gs">
                        <a href="/details/{{$item['id']}}">
                            <h2>{{$item['title']}}</h2>
                            <span class="dib">{{str_limit($item['abstract'], $limit = 42, $end = '...')}}</span>
                            {{--<p><span>￥1.00起</span></p>--}}
                            <div class="img-back">
                                <img src="{{env('IMG_URL').$item['img']}}" alt="{{$item['title']}}"
                                     title="{{$item['title']}}"/>
                            </div>
                        </a>
                    </li>
                @endforeach
                {{--<li class="gs">
                    <a href="/goodsInfo/246.html">
                        <h2>通信工程施工总承包资质</h2>
                        <span class="dib">多年行业经验，一对一专业顾问服务，快速审批通道，...</span>
                        <p><span>￥1.00起</span></p>
                        <div class="img-back">
                            <img src="/web/img/d6b8a4b31337d1812994ac28f15dc153.jpg" alt="通信工程施工总承包资质"
                                 title="通信工程施工总承包资质"/>
                        </div>
                    </a>
                </li>
                <li class="gs">
                    <a href="/goodsInfo/247.html">
                        <h2>机电安装工程施工总承包资质</h2>
                        <span class="dib">多年行业办理经验，专注建筑资质代办服务，专人跟进...</span>
                        <p><span>￥1.00起</span></p>
                        <div class="img-back">
                            <img src="/web/img/a6bab5fb8a899b90b43606e15e2843cf.jpg" alt="机电安装工程施工总承包资质"
                                 title="机电安装工程施工总承包资质"/>
                        </div>
                    </a>
                </li>
                <li class="gs">
                    <a href="/goodsInfo/248.html">
                        <h2>房屋建筑工程施工总承包资质</h2>
                        <span class="dib">多年办理经验，一对一专业顾问服务，快速审批通道，...</span>
                        <p><span>￥1.00起</span></p>
                        <div class="img-back">
                            <img src="/web/img/988788194a425664c3b1141f6f91b54c.jpg" alt="房屋建筑工程施工总承包资质"
                                 title="房屋建筑工程施工总承包资质"/>
                        </div>
                    </a>
                </li>
                <li class="gs">
                    <a href="/goodsInfo/250.html">
                        <h2>公路工程施工总承包资质</h2>
                        <span class="dib">专注建筑资质代办服务，专人跟进，收悉行业政策。</span>
                        <p><span>￥1.00起</span></p>
                        <div class="img-back">
                            <img src="/web/img/d96761e8be8c13e9a9a6c9b83075d97a.jpg" alt="公路工程施工总承包资质"
                                 title="公路工程施工总承包资质"/>
                        </div>
                    </a>
                </li>--}}
            </ul>
        </div>

        <div class="productInfo mt30">
            <div class="tab-catalog-02 titleFixed">
                <a class="atthis" href="javascript:void(0);">服务介绍</a>
                {{--<a href="javascript:void(0);">用户评价(0)</a>--}}
                <a href="javascript:void(0);">服务保障</a>
                <a href="javascript:void(0);">热门问答</a>
                {{--<a href="javascript:void(0);">关于我们</a>--}}
            </div>

            <div class="tab-cont">

                <div class="item" style="color:#656565;line-height:20px;">
                    <p>{!! $details['introduce'] !!}</p>
                </div>

                {{--<div class="item none">
                    <div class="pj">
                        <div class="left">
                            <p>与描述相符</p>
                            <b>100%</b>
                            <i class="full"></i>
                            <i class="full"></i>
                            <i class="full"></i>
                            <i class="full"></i>
                            <i class="full"></i>
                        </div>
                        <div class="right">
                            <p>好评（100%）<span><i style="width: 100%;"></i></span></p>
                            <p>中评（0%）<span><i style="width: 0%;"></i></span></p>
                            <p>差评（0%） <span><i style="width: 0%;"></i></span></p>
                        </div>
                    </div>

                    <ul class="pj-cont">
                    </ul>
                </div>--}}

                <div class="item none">
                    <p>{!! $details['security'] !!}</p>
                </div>
                <div class="item none">
                    <ul class="qa">
                        @foreach($answer as $item)
                        <li>
                            <p>Q : {{ $item['question'] }}</p>
                            <b>A : {{ $item['answer'] }}</b>
                        </li>
                        @endforeach

                    </ul>
                </div>

                {{--<div class="item about-me-block none">
                    <h3>集团简介</h3>
                    <div class="text-intro dib">
                        <p>
                            顶呱呱一站式企业服务平台，隶属北京顶呱呱企业管理有限公司。公司立足一线城市（北京、广州、深圳、成都、重庆、武汉、杭州、郑州、佛山、宜昌等），布局四方。以“让老板经营企业更简单”为使命，历经十余年服务实践和专业积淀，成为企业服务领域前三强，营业额逾百亿，员工超6000人，设立了五大版块，十六大业态，六百多项商业服务内容，实现商业全生命周期服务闭环。2014年，在上海股权交易中心成功挂牌。2017年，全国首创“一门式”全生命政企服务中心，深入推进“互联网+政务服务”。
                            在顶呱呱您将会有最好的企业服务体验，找到您能想到的所有企业服务项目，选择到最专业的企业服务顾问，为您提供一对一咨询，24小时在线高效服务。</p>
                    </div>
                    <div class="down-img">
                        <img src="/web/img/tupian.jpg" alt=""/>
                    </div>
                </div>--}}
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
        <div class="fot-right"><img src="/web/img/24.png">24小时服务热线：
            <h4>{{ $site['mobile'] }}</h4></div>
    </div>
</footer>
<!--底部 end-->
<script src="/web/js/selectstyle.js"></script>
<script src="/web/js/function.js"></script>
<script src="/web/js/layer.js"></script>
<script src="/web/js/goods.js"></script>
<script>
    var host = '{{env('DOMAIN')}}';
    if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
        window.location.href = "http://m."+host;
    }
    {!! $site['statistical_code'] !!}
</script>
</body>
</html>
