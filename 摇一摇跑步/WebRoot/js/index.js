/**
 * Created by yuh on 2018/4/28.
 */
$(function () {
    setupManifest();
    startPreload();
    var isIPHONE = navigator.userAgent.toUpperCase().indexOf("IPHONE") != -1;
    var audio = $("#audio")[0];
    if (isIPHONE) {
        document.addEventListener("WeixinJSBridgeReady", function () {
            audio.play()
        }, false)
    }
    var music_k = document.getElementById("music-k");
    var music_g = document.getElementById("music-g");
    audio.play();
    music_k.onclick = function () {
        music_g.style.display = "block";
        audio.pause();
        music_k.style.display = "none";
    };
    music_g.onclick = function () {
        music_k.style.display = "block";
        audio.play();
        music_g.style.display = "none";
    };

    var imgs = document.getElementsByTagName('img');
    for (var i = 0; i < imgs.length; i++) {
        imgs[i].addEventListener("click", function (e) {
            e.preventDefault();
        })
    }

    var times=null;
    var types=false;
    function setupManifest() {
        manifest = [{src: "img/music.mp3"}, {src: "img/p1.jpg"}, {src: "img/p2.jpg"}, {src: "img/p2.1.jpg"}, {src: "img/p3.jpg"}, {src: "img/p4.jpg"}, {src: "img/tan.png"}, {src: "img/p3.jpg"}, {src: "img/p4.jpg"}, {src: "img/15.png"}, {src: "img/14.png"}, {src: "img/13.png"}, {src: "img/12.png"}, {src: "img/11.png"}, {src: "img/10.png"}, {src: "img/9.png"}, {src: "img/8.png"}, {src: "img/7.png"}, {src: "img/6.png"}, {src: "img/5.png"}, {src: "img/4.png"}, {src: "img/2.png"}, {src: "img/2.png"}, {src: "img/1.png"}, {src: "img/0.png"}, {src: "img/reset-20.jpg"}, {src: "img/reset-40.jpg"}, {src: "img/reset-60.jpg"}, {src: "img/reset-80.jpg"}, {src: "img/reset-100.jpg"}]
    }
    function startPreload() {
        preload = new createjs.LoadQueue(true);
        preload.on("progress", handleFileProgress);
        preload.on("complete", loadComplete);
        preload.loadManifest(manifest)
    }
    function handleFileProgress(event) {
        if (preload.progress <= 1) {
            // $(".jd").html(parseFloat(preload.progress * 100) + "%");
        }
    }
    function loadComplete(event) {
        setTimeout(function () {
            $(".loading").hide();
            $(".main").show();
            $(".music").show();
            init();
        }, 1000 / 60);
    }
    function init() {
        $(".rule").click(function () {
            $(".pop-up").show();
        });
        $(".pop-up").click(function () {
            $(".pop-up").hide();
        });
        $(".start").click(function () {
            $(".main").hide();
            $(".jChen").show();
        });
        $(".j_start").click(function () {
            $(".jChen").hide();
            $(".second").show();
        });
        $(".btn-up").click(function () {
            $(".btn-up").hide();
            $(".btn-down").show();
            setTimeout(function () {
                $(".center").show();
                $(".btn-up").hide();
                $(".second").hide();
            }, 100);
        });
        $(".btn1-up").click(function () {
            if(types){
                return false;
            }
            types=true;
            $(".btn1-up").hide();
            $(".btn1-down").show();
            $(".tisi").hide();
            $(".go").show().addClass("go-go");
            setTimeout(function () {
                $(".btn1-up").show();
                $(".btn1-down").hide();
            }, 300);
            setTimeout(function () {
                $(".go").hide();
                run();
            }, 1000)
        });

        $(".pop-down").click(function () {
            $(".pop-down").hide();
            $(".share").hide();
        });
        $(".fx").click(function () {
            $(".pop-down").show();
            $(".share").show();
        });
        $(".reset").click(function () {
            $('.result').hide();
            $('.center').show();
            $(".time").children().eq(15).addClass("img-show");
            $(".tisi").show();
            types=false;
        });
    }
    function jump(num) {
        times = setTimeout(function () {
            num--;
            $(".time").children().removeClass("img-show");
            if (num >= 0) {
                $(".time").children().eq(num).addClass("img-show");
                jump(num);
            } else {
                clearTimeout(times);
                $('.center').hide();
                $('.result').show();
                $(".time").children().eq(15).addClass("img-show");
                $(".sum").html("0000");
            }
        }, 1000);
    }
    function run() {
        jump(15);
        var last_update = 0,
            count = 0,
            x = y = z = last_x = last_y = last_z = 0;
        var isprint = false;
        if (window.DeviceMotionEvent) {
            window.addEventListener("devicemotion", deviceMotionHandler, false);
        } else {
            alert("本设备不支持devicemotion事件");
        }
        deviceMotionHandler();
        function deviceMotionHandler(e) {
            var acceleration = e.accelerationIncludingGravity;
            var currTime = new Date().getTime();
            if (currTime - last_update > 100) {
                last_update = currTime;
                x = acceleration.x;
                y = acceleration.y;
                z = acceleration.z;
                var x1 = Math.abs(x - last_x);
                var y1 = Math.abs(y - last_y);
                var z1 = Math.abs(z - last_z);
                var max = 0;
                if (x1 > y1) {
                    if (x1 > z1) {
                        max = x1;
                    } else {
                        max = z1;
                    }
                } else {
                    if (y1 > z1) {
                        max = y1;
                    } else {
                        max = z1;
                    }
                }
                if (max < 5 && isprint) {
                    doResult();
                } else if (max > 30) {
                    count++;
                    isprint = true;
                }
                last_x = x;
                last_y = y;
                last_z = z;
            }
        }

        function doResult() {
            clearTimeout(times);
            $(".result").removeClass("res1 res2 res3 res4 res5");
            setTimeout(function () {
                $(".time").children().removeClass("img-show");
                var sum = parseInt(count);
                sum = parseInt(sum * 20);
                $(".center").hide();
                $(".result").show();
                if (sum < 100) {
                    sum = "00" + sum;
                    $(".sum").html(sum);
                    $(".result").addClass('res1');
                } else if (sum < 800) {
                    sum = "0" + sum;
                    $(".sum").html(sum);
                    $(".result").addClass('res1');
                } else if (sum < 1000) {
                    sum = "0" + sum;
                    $(".sum").html(sum);
                    $(".result").addClass('res2');
                }
                else if (sum < 1500) {
                    $(".sum").html(sum);
                    $(".result").addClass('res3');
                } else if (sum <2000) {
                    $(".sum").html(sum);
                    $(".result").addClass('res4');
                } else if (sum >= 2000) {
                    $(".sum").html(sum);
                    $(".result").addClass('res5');
                }
                isprint = false;
                window.removeEventListener("devicemotion", deviceMotionHandler);
            }, 1000);
        }
    }
});
