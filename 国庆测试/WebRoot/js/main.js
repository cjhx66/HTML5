/**
 * Created by yuh on 2017/9/18.
 */
$('body').on('touchmove',function(event){
    event.preventDefault();
});
var music_k=document.getElementById('music_k');
var audio=document.getElementById('audio');
var music_g=document.getElementById('music_g');
audio.play();
music_g.onclick=function(){
    music_g.style.display='none';
    audio.play();
    music_k.style.display="block";
};
music_k.onclick=function(){
    music_k.style.display="none";
    audio.pause();
    music_g.style.display="block";
};
$(function () {
    $("body>div").height($(window).height());
    //第二页闪动
    var loadimg = new Horse(".title_shi", 5);
    loadimg.walk();

    var random = [2, 3, 4, 5, 6, 7];
    //点击进入

    $(".first").click(function () {
        $(".first").removeClass("active");
        $(".start").addClass("active");
    });

    $(".start").click(function () {
        $(".start").removeClass("active");
        var child = $(this).parents(".main").children();
        // var rand = parseInt(Math.random() * 6 + 1);
        var rand = parseInt(Math.random() * 5);
        // console.log("随机数：" + rand);
        // console.log("数组中对应的数：" + random[rand]);
        // console.log(child.eq(random[rand]));
        child.eq(random[rand]).addClass("active");
        var index = 0;
        for (var i = 0; i < random.length; i++) {
            if (random[i] == random[rand]) {
                random.splice(i, 1);
            }
        }
        // console.log(random);
    });
    //点击是
    $(".main").on("click", ".logo>.choose>.yes", function () {
        var type = $(this).parents(".logo");
        var num = parseInt(type.attr("class").replace(/[^0-9]/ig, ""));
        $(".tan_type").removeClass().addClass("tan_type");
        switch (num) {
            case 1:
                $(".tan_type").attr('src', 'img/tan_duche.png').addClass("tan_duche");
                break;
            case 2:
                $(".tan_type").attr('src', 'img/tan_lvyou.png').addClass("tan_lvyou");
                break;
            case 3:
                $(".tan_type").attr('src', 'img/tan_jiaban.png').addClass("tan_jiaban");
                break;
            case 4:
                $(".tan_type").attr('src', 'img/tan_tuanyuan.png').addClass("tan_tuanyuan");
                break;
            case 5:
                $(".tan_type").attr('src', 'img/tan_zaijia.png').addClass("tan_zaijia");
                break;
            case 6:
                $(".tan_type").attr('src', 'img/tan_huili.png').addClass("tan_huili");
                break;
        }
        $(".poster").show();
    });
    //点击不是
    $(".main").on("click", ".logo>.choose>.no", function () {
        if (random.length == 0) {
            $(".poster").show();
            $(".tan_type").removeClass().addClass("tan_type");
            $(".tan_type").attr('src', 'img/tan_no.png').addClass("tan_no");
        } else {
            // console.log("数组长度:" + random.length);
            var rand = Math.ceil(Math.random() * (random.length - 1));
            // console.log("随机数：" + rand);
            // console.log("数组中对应的数：" + random[rand]);
            // console.log($(this).parents(".main").children().eq(random[rand]));
            $(this).parents(".main").children().eq(random[rand]).addClass("active");
            $(this).parents(".logo").removeClass("active");
            for (var i = 0; i < random.length; i++) {
                if (random[i] == random[rand]) {
                    random.splice(i, 1);
                }
            }
            // console.log("数组：" + random);
        }

    });
    //生成海报
    $(".tan_btn").click(function () {
        var type = $(this).prev().attr("class").substring(9);
        $(".poster").hide();
        $(".main").hide();
        $(".last").show();
        if (type == "tan_duche") {
            $(".bottom").attr('src', 'img/bottom_duche.png');
        } else if (type == "tan_lvyou") {
            $(".bottom").attr('src', 'img/bottom_lvyou.png');
        } else if (type == "tan_jiaban") {
            $(".bottom").attr('src', 'img/bottom_jiaban.png');
        } else if (type == "tan_lvyou") {
            $(".bottom").attr('src', 'img/bottom_lvyou.png');
        } else if (type == "tan_tuanyuan") {
            $(".bottom").attr('src', 'img/bottom_tuanyuan.png');
        } else if (type == "tan_zaijia") {
            $(".bottom").attr('src', 'img/bottom_zaijia.png');
        } else if (type == "tan_huili") {
            $(".bottom").attr('src', 'img/bottom_huili.png');
        } else if (type == "tan_no") {
            $(".bottom").attr('src', 'img/bottom_no.png');
        }
    });
    //再玩一次
    $(".play").click(function () {
        $(".last").hide();
        for (var i = 0; i < $(".main").children().length; i++) {
            $(".main").children().eq(i).removeClass("active");
        }
        $(".main").show();
        $(".start").addClass("active");
        random = [2, 3, 4, 5, 6, 7];
    });
//    分享
    $(".share").click(function () {
        $(".fina").show();
    })
//    消失
    $(".fina").click(function () {
        $(this).hide();
    });

//    音乐
    $(window).one('touchstart', function () {
        $("#audio")[0].play();
    });
    document.addEventListener("WeixinJSBridgeReady", function () {
        $("#audio")[0].play();
    }, false);
    document.addEventListener("WeixinJSBridgeReady", function () {
        audioAutoPlay('audio');//给个全局函数
    }, false);

    function audioAutoPlay(id) {//全局控制播放函数
        var audio = document.getElementById(id),
            play = function () {
                audio.play();
                document.removeEventListener("touchstart", play, false);
            };
        audio.play();
        document.addEventListener("touchstart", play, false);
    }
});
