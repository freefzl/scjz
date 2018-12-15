function userNameSet(str){
    var reg=/((((13[0-9])|(15[^4])|(18[0,1,2,3,5-9])|(17[0-8])|(147))\d{8})|((\d3,4|\d{3,4}-|\s)?\d{7,14}))?/g;
    var m=str.match(reg);
    if(!m)return str;
    var phone,index,str1,str2,str3,phoneArr;
    for(var i in m){
        if(m[i].length==11){
            phone=m[i];
            break;
        }
    }
    if(!phone)return str;
    index=str.indexOf(phone);
    str1=str.slice(0,index);
    str3=str.slice(index+11);
    phoneArr=phone.split('');
    phoneArr.splice(3,4,'*','*','*','*');
    str2=phoneArr.join('');
    return str1+str2+str3;
}

$(function(){
    for(var i=0;i<$(".userName").length;i++){
        $($(".userName")[i]).html(userNameSet($($(".userName")[i]).html()));
    }
});

$("#areaShow").click(function () {
    $(".areaText").show();
});

$('body').click(function (e) {
    if (e.target.id || e.target.parentElement.id) {
        return false;
    }
    $(".areaText").hide();
});

// 地区切换
$(".areaText .title").on('click','a',function () {
    $(".areaText .title a").removeClass('atthis');
    $(this).addClass('atthis');
    var i = $(this).index();
    $(".list ul").hide();
    $(".list ul:eq("+i+")").show();
})

// 城市
$("#provinceList").on('click', 'li', function () {
    $("#city_id").val('');
    $("#provinceList li").removeClass('atthis');
    $(this).addClass('atthis');
    var that = this;
    var area_id = $(this).attr("id");
    var action = $("#check_city").val();
    var keys = [];
    $(".choose").each(function (index,element) {
        $(element).find("span").each(function (i,e) {
            if ($(e).attr("class") == 'atthis'){
                keys.push($(e).data('item_id'));
                return true;
            }
        });
    });
    keys  = keys.join('_');
    var data = {
        'goods_id' : $('#goodsId').val(),
        'city_id' : area_id,
        'action' : action,
        'keys':keys
    };
    $.ajax({
        url: "/Home/Goods/get_city",
        type: 'POST',
        data: data,
        success: function (res) {
            var html ='';
            $(".areaText .title a:eq(1)").html('请选择');
            $(".areaText .title a:eq(2)").hide();
            for (var i = 0; i < res.length; i++) {
                html+='<li id="'+ res[i].id +'"><span>'+res[i].name+'</span></li>';
            }
            $("#cityList").html(html);
            $(".areaText .title a:eq(1)").trigger('click');
            $("#areaShow").val($(that).find('span').html());
            $(".areaText .title a:eq(0)").html($(that).find('span').html());
        },
        error: function (err) {
            console.log(err);
        }
    });
});

// 市
$("#cityList").on('click', 'li', function () {
    $("#city_id").val('');
    $("#cityList li").removeClass('atthis');
    $(this).addClass('atthis');
    var that = this;
    var area_id = $(this).attr("id");
    var action = $("#check_city").val();
    var keys = [];
    $(".choose").each(function (index,element) {
        $(element).find("span").each(function (i,e) {
            if ($(e).attr("class") == 'atthis'){
                keys.push($(e).data('item_id'));
                return true;
            }
        });
    });
    keys  = keys.join('_');
    var data = {
        'goods_id' : $('#goodsId').val(),
        'area_id' : area_id,
        'action' : action,
        'keys':keys
    }
    $.ajax({
        url: '/Home/Goods/get_area',
        type: 'POST',
        data: data,
        success: function (res) {
            var html ='';
            $(".areaText .title a:eq(2)").html('请选择').show();
            for (var i = 0; i < res.length; i++) {
                html+='<li id="'+ res[i].id +'"><span>'+res[i].name+'</span></li>';
            }
            $("#areaList").html(html);
            $(".areaText .title a:eq(2)").trigger('click');
            $(".areaText .title a:eq(1)").html($(that).find('span').html());
            $("#areaShow").val($(".areaText .title a:eq(0)").html()+ '-' +$(that).find('span').html());
        },
        error: function (err) {
            console.log(err);
        }
    });
});

// 区
$("#areaList").on('click', 'li', function () {
    $("#areaList li").removeClass('atthis');
    $(this).addClass('atthis');
    $("#areaShow").val($(".areaText .title a:eq(0)").html()+ '-' + $(".areaText .title a:eq(1)").html() + '-' +$(this).find('span').html());
    $(".areaText").hide();
    changePrice($(this).attr('id'));
})

$(function(e) {
    //tab切换
    $(".productInfo").showtab({
        nav: ".tab-catalog-02", //导航
        naver: "a", //导航子类
        cont: ".tab-cont", //内容
        conter: ".item", //内容子类
        direction:'right',//动画方向
        type:2,//动画类型
        event:'click'
    });
});

$("#submitBtn").click(function () {
    var check = $("#city_id").val();
    if($("#check_submit").val()==2){
        layer.msg('该地区暂时不提供此服务，如有疑问请在线咨询');
        return false;
    }
   /* if (check){
        $.get('/Home/Cart/checkUser','',function (res) {
            if(res.code=='200'){
                $("#goodsForm").submit();
            }else{
                layer.msg('请先登录！');
            }
         })

    }else {
        layer.msg('请选择地区');
    }*/
    $("#goodsForm").submit();
});

//选择规格
$(".choose span").click(function () {
    if ($(this).hasClass('atthis')){
        return false;
    }
    $(this).parent().parent().parent(".choose").find("span").removeClass("atthis");
    $(this).addClass("atthis");
    changePrice();
});

//选择区域
$(".beautify").change(function (c) {
    changePrice();
})

//数量修改价格修改
function controlNum(type, obj) {
    var num = $(obj).parents(".num").find('input').val();
    if(type == 1) {
        if (num<99) {
            num++
        }else {
            $(obj).parents(".num").find('input').val(99);
            return false;
        }
    } else {
        if (num>1) {
            num--
        }else {
            $(obj).parents(".num").find('input').val(1);
            return false;
        }
    }
    $(obj).parents(".num").find('input').val(num);
}

function changePrice(t){
    //商品价格随规格变动
    $("#areaList li").each(function(){
        if($(this).hasClass('atthis')){
            $("#city_id").val($(this).attr("id"));
        }
    });
    var keys = [];
    $(".choose").each(function (index,element) {
        $(element).find("span").each(function (i,e) {
            if ($(e).attr("class") == 'atthis'){
                keys.push($(e).data('item_id'));
                return true;
            }
        });
    });
    var data = {
        'goods_id' : $("#goodsId").val(),
        'keys' : keys,
        'city_id':t
    }
    $.post("/Home/Goods/getPriceByItemId",data,function (res) {
        if (res.error==0){
            if(res.data.has_city){
                var str1='',str2='',str3='';
                for(var i=0;i<res.data.select_province.length;i++){
                    if(res.data.select_province[i].id == res.data.province){
                        str1 += '<li id="'+res.data.select_province[i].id+'" class="atthis"><span>'+res.data.select_province[i].name+'</span></li>';
                    }else{
                        str1 += '<li id="'+res.data.select_province[i].id+'"><span>'+res.data.select_province[i].name+'</span></li>';
                    }
                }
                for(var i=0;i<res.data.select_city.length;i++){
                    if(res.data.select_city[i].id == res.data.city) {
                        str2 += '<li id="'+res.data.select_city[i].id+'" class="atthis"><span>'+res.data.select_city[i].name+'</span></li>';
                    }else{
                        str2 += '<li id="'+res.data.select_city[i].id+'"><span>'+res.data.select_city[i].name+'</span></li>';
                    }
                }
                for(var i=0;i<res.data.select_area.length;i++){
                    if(res.data.select_area[i].id == res.data.city_id) {
                        str3 += '<li id="'+res.data.select_area[i].id+'" class="atthis"><span>'+res.data.select_area[i].name+'</span></li>';
                    }else {
                        str3 += '<li id="'+res.data.select_area[i].id+'"><span>'+res.data.select_area[i].name+'</span></li>';
                    }
                }
                $("#provinceList").html(str1);
                $("#cityList").html(str2);
                $("#areaList").html(str3);
                var areaShow = res.data.province_name+'-'+res.data.city_name+'-'+res.data.area_name;
                $("#areaShow").val(areaShow);
                $("#province").html(res.data.province_name);
                $("#city").html(res.data.city_name);
                $("#area").html(res.data.area_name);
            }
            if(res.data.city_id){
                $("#city_id").val(res.data.city_id);
            }
            $("#item_id").val(res.data.item_id);
            $("#goodsPrice").html(res.data.price+' <b>元</b>');
            if(res.data.no_default){
                $("#goodsPrice").html('面议');
                $("#tip_msg").html('请在线咨询');
                $("#check_submit").val(2);
            }else{
                if(res.data.is_new){
                    $("#tip_msg").html('该服务需一次性支付');
                }else{
                    $("#tip_msg").html('1元急速响应，具体办理价格面议');
                }
                $("#check_submit").val(1);
            }

        }else {
            if(res.error == 3){
                $("#goodsPrice").html('面议');
                $("#tip_msg").html('请在线咨询');
                $("#check_submit").val(2);
            }
        }
    },'json');
}


//预约上门弹窗
function bespeak() {
    layer.open({
        type:1,
        title:"上门服务",
        btn: ['确认', '取消'],
        content:$(".bespeak"),
        yes: function () {
            $("#bespeak").show();
            var phone = $("#bespeak input[name='bphone']").val();
            if(!checkMobile(phone)){
                layer.msg('请输入电话号码');
                return false;
            }
            var p = $("#province-box").val();
            var c = $("#city-box").val();
            var a = $("#district-box").val();
            if(p==0 || c==0 || a==0){
                layer.msg('请选择地区');
                return false;
            }
            data = {
                'name' : $("#bespeak input[name='username']").val(),
                'phone' : $("#bespeak input[name='bphone']").val(),
                'type' : $("#bespeak input[name='bname']").val(),
                'content' : $("#bespeak textarea[name='bcontent']").val(),
                'p':p,
                'c':c,
                'a':a,
                'baddress' : $("#bespeak input[name='baddress']").val(),
                'action': $("#bespeak input[name='action']").val(),
                'info_token': $("#bespeak input[name='info_token']").val()
            }
            layer.load();
            $.post("/Home/Demand/store",data,function (res) {
                layer.closeAll();
                layer.msg(res.msg);
            },'json');
        },
        cancel: function () {
            $("#bespeak").hide();
        }
    });
}

//留言切换省份
$("#province-box").click(function () {
    if($(this).val()>0) {
        $.post("/Home/Api/getRegion", {parent_id: $(this).val()}, function (res) {
            $("#city-box").html('').append(res);
            $("#district-box").html('').append('<option value="0">请选择</option>');
        });
    }
});

//留言切换城市
$("#city-box").click(function () {
    if($(this).val()>0){
        $.post("/Home/Api/getRegion",{parent_id:$(this).val()},function (res) {
            $("#district-box").html('').append(res);
        });
    }
});

//点击收藏商品
function collect_goods(goods_id){
    $.ajax({
        type : "GET",
        dataType: "json",
        url:"/Home/Goods/collect_goods",
        data: {goods_ids:goods_id},
        success: function(res) {
            layer.msg(res.msg, function () {
                if (res.status == 1) {
                    $("#collect").attr({"class":"sced","onclick":"del_collect_goods("+goods_id+")"}).text("已收藏");
                }
            });
        }
    });
}


//点击取消收藏商品
function del_collect_goods(goods_id){
    $.ajax({
        type : 'post',
        url:"/Home/Goods/del_collect_goods",
        dataType : 'json',
        data: {goods_ids:goods_id},
        success : function(res){
            layer.msg(res.msg,function () {
                if (res.status==1){
                    $("#collect").attr({"class":"sc","onclick":"collect_goods("+goods_id+")"}).text("收藏");
                }
            });
        }
    });
}

//固定导航
$(window).scroll(function () {
    if ($(window).scrollTop()>=$(".tab-cont").offset().top-23) {
        $(".titleFixed").css({position: "fixed", width:1200, top: 0,"z-index": 999});
    }else {
        $(".titleFixed").css({position: "static"});
    }
});
window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"1","bdMiniList":["qzone","tsina","weixin","tqq","sqq"],"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};
with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
$("")