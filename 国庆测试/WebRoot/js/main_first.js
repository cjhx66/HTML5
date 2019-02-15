/**
 * Created by yuh on 2017/9/18.
 */
$(function () {
    $("body>div").height($(window).height());
    var random = [1, 2, 3, 4, 5, 6];
    $(".btn").click(function () {
        $(".start").removeClass("active");
        var child = $(this).parents(".main").children();
        var rand = parseInt(Math.random() * 6 + 1);
        child.eq(rand).addClass("active");
        var index = 0;
        for (var i = 0; i < random.length; i++) {
            if (random[i] == rand) {
                index = i;
            }
        }
        random.splice(index, 1);
        // console.log(random);
    });

    $(".play>a").click(function () {
        // debugger;
        $(".poster").hide();
        console.log($(".main").children());
        for (var i = 0; i < $(".main").children().length; i++) {
            $(".main").children().eq(i).removeClass("active");
        }
        $(".main").show();
        $(".start").addClass("active");
        random = [1, 2, 3, 4, 5, 6];

    })
    $(".main").on("click", ".logo>.choose>.yes", function () {
        var type = $(this).parents(".logo");
        // console.log(type.attr("class"));
        var num = parseInt(type.attr("class").replace(/[^0-9]/ig, ""));
        // console.log(num);
        $(".main").hide();
        $(".poster").show();
        switch (num) {
            case 1:
//                    type.removeClass("active");
                $(".label>.label_name").html("乌龟爬");
                $(".label_img").css("background", "url(img/sq/q01r.png)");
                break;
            case 2:
                $(".label>.label_name").html("行进的旅者");
                $(".label_img").css("background", "url(img/sq/q02r.png)");
                break;
            case 3:
                $(".label>.label_name").html("加班狗");
                $(".label_img").css("background", "url(img/sq/q03r.png)");
                break;
            case 4:
                $(".label>.label_name").html("幸福ing");
                $(".label_img").css("background", "url(img/sq/q04r.png)");
                break;
            case 5:
                $(".label>.label_name").html("吃土君");
                $(".label_img").css("background", "url(img/sq/q05r.png)");
                break;
            case 6:
                $(".label>.label_name").html("瘫在家");
                $(".label_img").css("background", "url(img/sq/q02cont.png)");
                break;
        }
    })

    $(".main").on("click", ".logo>.choose>.no", function () {
        if (random.length == 0) {
            $(".main").hide();
            $(".poster").show();
            $(".poster").show();
            $(".label>.label_name").html("国庆神人");
            $(".label_img").css("background", "url(img/sq/q01cont.png)");
        }
        // console.log("数组长度:"+random.length);
        var rand = Math.ceil(Math.random() * (random.length - 1));
        // console.log("随机数："+rand);
        // console.log("数组中对应的数："+random[rand]);
        $(this).parents(".main").children().eq(random[rand]).addClass("active");
        $(this).parents(".logo").removeClass("active");

        for (var i = 0; i < random.length; i++) {
            if (random[i] == random[rand]) {
                random.splice(i, 1);
            }
        }
        // console.log("数组："+random);
    })
})
