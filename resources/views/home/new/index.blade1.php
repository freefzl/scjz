<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>蜀创建筑-服务项目列表</title>
    <link href="web/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="web/css/main.css" />
    <link rel="stylesheet" href="web/css/all-sever.css" />
    <script type="text/javascript" src="web/js/jquery.js"></script>
</head>

<body>

<!--导航-->
<div class="wl100" style="background: #ffffff">
    <div class="content"><span><img src="web/img/logo.jpg"></span>
        <div id="top-right"><img src="web/img/24phone.png">
            <ul>
                <li>
                    <a href="">首页</a>
                </li>
                <li>
                    <a href="">施工资质</a>
                </li>
                <li>
                    <a href="">建筑公司收购</a>
                </li>
                <li>
                    <a href="">股权转让</a>
                </li>
                <li>
                    <a href="">设计资质</a>
                </li>
                <li>
                    <a href="">房地产开发资质</a>
                </li>
                <li>
                    <a href="">入川备案</a>
                </li>
                <li>
                    <a href="">关于我们</a>
                </li>
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
            <a href="/" class="dib">业务百科</a>
            <span class="dib">内容详情</span>
        </div>
    </div>
    <div class="news-show">
        <div class="news-details">
            <div class="details">
                <h5>网站建设公司建网站的详细步骤是哪些</h5>
                <label><font>2019-01-25 15:56:55</font>
                    <font>来源：筑小建</font>
                    <font>浏览：1258</font>
                    <font>咨询电话：400-888-8888</font>
                </label>
                <div class="details-bd">
                    <h4>网站建设公司建网站的详细步骤是哪些</h4>
                    <img src="web/img/591621de65859cb8c3f30e7d2d1f1872.jpg">
                    <P>一、网站搭建
                        <br> 首要的就是做好网站的搭建，许多朋友可能会觉得非常的麻烦，不知道应该如何进行网站搭建，其实现在建网站，也是有着许多的模板的，那么在进行建设的时候，也是可以根据模板，选择一站式建站，这样一来，只需要鼠标轻轻一点，也是可以很轻松的完成网站的搭建的。不仅仅非常的方便，而且耗费的时间与精力也是非常小。
                        <br> 二、域名以及服务器的购买
                        <br> 想要进行建站，那么也是离不开域名以及服务器的购买的，如果没有域名，那么用户是找不到企业的网站的。而服务器作为网站的载体，在进行建站的时候，也是需要进行购买的。但这里小编想要特别提醒大家的就是，在进行服务器的购买时，也是要根据企业的实际情况来进行购买的，而不要选择一些存储量比较小的服务器，以免影响日后的使用。服务器购买完以后，也是需要做好服务器的安装使用的。<br> 三、网站系统的安装
                        <br> 需要注意如何进行网站系统的安装的，一般来说，常见的网站开发系统也是有着很多的，那么不同的网站，也是需要选择不同的系统的。这就需要企业根据自己的实际情况来进行网站系统的选择的。
                    </P>
                </div>
                <div class="details-tips"><p>免责申明:</p>
                    <p>1、文章部分文字与图片来源于网络，如有问题请联系我们。</p>
                    <p>2、因编辑需要，文字和图片之间亦无必然联系，仅供参考。涉及转载的所有文章、图片、音频视频文件等资料，版权归版权所有人所有。</p>
                    <p>3、本文章内容若无意中侵犯了您的知识产权，请联系我们删除，联系方式：请邮件发送至zhoutaodao@dgg.net。</p>
                </div>
            </div>
        </div>
    </div>
    <!--content end-->
    <!--底部-->
    <footer>
        <div class="content">
            <div class="fot-left">
                <a href="/">关于我们</a> |
                <a href="/">联系我们</a>
                <p> ©2018版权所有 备案号：蜀ICP备15006740号-3</p>
            </div>
            <div class="fot-right"><img src="web/img/24.png">24小时服务热线：
                <h4>400-8888-888</h4></div>
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