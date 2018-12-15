/**
 * tab切换插件
 * @return
 */
(function ($) {
 $.fn.showtab = function(options) { 
 var dft = {
         nav: ".tab-catalog-00", //导航
         naver: "a", //导航子类
         cont: ".tab-cont", //内容
         conter: "ul", //内容子类
         direction:'right',//动画方向
         type:2,//动画类型
         event:'mouseover'
 };
 var ops = $.extend(true,{},dft,options);
 this.each(function(){
    //插件实现代码
    var textCont =$(this);
    textCont.ops=ops;
    var w   = textCont.find(textCont.ops.cont).outerWidth();
    var h   = textCont.find(textCont.ops.cont).outerHeight();
     textCont.old_index=0;
    function selectClass(obj){
        textCont.find(obj).parents(textCont.ops.nav).find(textCont.ops.naver).removeClass("atthis");
        textCont.find(obj).addClass("atthis");
    }

    function animateTab(obj,direction,index){
        var direcObj1 = {},direcObj2 = {},direcObj3 = {};
        direcObj1['left']   =0;
        direcObj1['top']    =0;
        direcObj1[direction]=(direction=='top' || direction=='bottom')?h:w;
        direcObj1['display']='none';
        direcObj2['left']   =0;
        direcObj2['top']    =0;
        direcObj2[direction]=(direction=='top' || direction=='bottom')?-h:-w;
        direcObj3[direction]=0;
        var leng=textCont.find(obj).find(textCont.ops.conter).length;
        textCont.find(obj).find(textCont.ops.conter).css(direcObj1);
         
        if(textCont.ops.type=='2'){
            if(textCont.old_index > index){
                textCont.find(obj).find(textCont.ops.conter).stop().css(direcObj2);
            }
        }else if(textCont.ops.direction=='bottom' || textCont.ops.direction=='right'){
            textCont.find(obj).find(textCont.ops.conter).stop().css(direcObj2);
        }
        textCont.find(obj).find(textCont.ops.conter).eq(index).css("display","block").stop().animate(direcObj3);
    }

    function swith(obj){
        var par = textCont.find(obj).parents(textCont.ops.nav);
        var subcont = par.nextAll(textCont.ops.cont);
        var i   = textCont.find(obj).index();
        if(textCont.old_index != i){
            if(textCont.ops.direction=='left' || textCont.ops.direction=='right'){
                animateTab(subcont,'left',i);
            }else if(textCont.ops.direction=='top' || textCont.ops.direction=='bottom'){
                animateTab(subcont,'top',i);
            }else{
                //参数传递错误
                alert("方向参数传递错误（left/right/top/bottom）");
            }
        }
        textCont.old_index = i;
    }
    //css初始化
    if(textCont.ops.direction=='left' || textCont.ops.direction=='right'){
        textCont.find(textCont.ops.cont).css({position:"relative",overflow:"hidden"});
    }else{
        textCont.find(textCont.ops.cont).css({position:"relative",height:h,overflow:"hidden"});
    }
    textCont.find(textCont.ops.conter).css({position:"relative",width:"100%"});

    if(textCont.ops.event=='click'){
       $(textCont.ops.nav).find(textCont.ops.naver).click(function(){
           selectClass(this);
           swith(this);
       });
    }else{
       $(textCont.ops.nav).find(textCont.ops.naver).mouseover(function(){
           selectClass(this);
           swith(this);
       });
    }
}); 
}    
})(jQuery);