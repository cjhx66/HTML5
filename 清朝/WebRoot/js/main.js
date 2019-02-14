$(function () {
    var manifest, preload;
    setupManifest();
    startPreload();
    var isIPHONE = navigator.userAgent.toUpperCase().indexOf("IPHONE") != -1;
    var music = $("#music")[0];
    if (isIPHONE) {
        document.addEventListener("WeixinJSBridgeReady", function () {
            music.play()
        }, false)
    }
    function setupManifest() {
        manifest = [{src: "img/10-bg.jpg"}, {src: "img/8.jpg"}, {src: "img/9.jpg"}, {src: "img/10.jpg"}, {src: "img/11.jpg"}, {src: "img/12.jpg"}, {src: "img/13.jpg"}, {src: "img/10-3.jpg"}, {src: "img/10-4.jpg"}, {src: "img/13-bg1-bg.jpg"}, {src: "img/13-bg2-bg.jpg"}, {src: "img/13-bg3-bg.jpg"}, {src: "img/13-bg4-bg.jpg"}, {src: "img/13-bg5-bg.jpg"}, {src: "img/45.jpg"}, {src: "img/46.jpg"}, {src: "img/47.jpg"}, {src: "img/48.jpg"}, {src: "img/49.jpg"}, {src: "img/50.jpg"}, {src: "img/51.jpg"}, {src: "img/52.jpg"}, {src: "img/h5-1.mp3"}]
    }

    function startPreload() {
        preload = new createjs.LoadQueue(true);
        preload.on("progress", handleFileProgress);
        preload.on("complete", loadComplete);
        preload.loadManifest(manifest)
    }

    function handleFileProgress(event) {
        $(".load-img").css("margin-left", parseInt(4 * (preload.progress * 81)));
        if (preload.progress <= 1) {
            $(".jindu").width(4 * (preload.progress * 100))
        }
    }

    function loadComplete(event) {
        TweenMax.to('.top', .5, {
            onComplete: function () {
                $(".top").remove();
                init()
            }
        }, .1)
    }

    var page = [];
    for (var i = 1; i < $(".main").children().length + 1; i++) {
        page['animate' + i] = new TimelineMax()
    }
    function init() {
        $(".main").slideDown(300, function () {
            page['animate' + 1].play();
            music.play()
        });
        page['animate' + 1].to('.title', .5, {delay: .5, opacity: 1});
        page['animate' + 1].to('.title2', 4, {height: 748, ease: Linear.easeIn});
        page['animate' + 1].to('.title1', 4.3, {height: 748, ease: Linear.easeIn});
        page['animate' + 1].pause();
        page['animate' + 2].to(".page2", .3, {
            onStart: function () {
                $(".page1").hide();
                $(".page2").show()
            }
        }, 0);
        page['animate' + 2].to(".leftYun", 2, {bottom: 0}, 0);
        page['animate' + 2].to(".rightYun", 2, {top: 0}, 0);
        page['animate' + 2].to(".tisi", .5, {delay: .5, opacity: 1}, .8);
        page['animate' + 2].to(".wumai", .5, {opacity: 1, width: 443});
        page['animate' + 2].pause();
        page['animate' + 3].to(".page3", .3, {
            delay: .5, onStart: function () {
                $(".page2").hide();
                $(".page3").show()
            }
        }, '+=.5');
        page['animate' + 3].to(".emperor-speak-1", .5, {delay: .5, opacity: 1});
        page['animate' + 3].to(".heshen-speak-1", .5, {delay: 1, opacity: 1});
        page['animate' + 3].to(".lei", .3, {delay: .3, opacity: 1});
        page['animate' + 3].to(".shui", .5, {height: 24});
        page['animate' + 3].pause();
        page['animate' + 4].to(".page4", .1, {
            onStart: function () {
                $(".page3").hide();
                $(".page4").show()
            }
        });
        page['animate' + 4].to(".page4", .5, {height: $(window).height()}, '-=.1');
        page['animate' + 4].to(".emperor-js-name", .5, {delay: .3, autoAlpha: 1});
        page['animate' + 4].to(".emperor-js-1", .5, {delay: .3, autoAlpha: 1});
        page['animate' + 4].to(".emperor-js-2", .5, {autoAlpha: 1});
        page['animate' + 4].to(".tan-h1", 3.5, {delay: .1, marginLeft: -615});
        page['animate' + 4].to(".tan-h2", 2.5, {marginLeft: -690}, '-=3.3');
        page['animate' + 4].to(".tan-h3", 3, {marginLeft: -615}, '-=3.4');
        page['animate' + 4].to(".tan-h4", 3.5, {marginLeft: -690}, '-=3.2');
        page['animate' + 4].to(".page4", .5, {
            onStart: function () {
                page['animate' + 4].to(".emperor-js-name", .5, {opacity: 0}, '-=.5');
                page['animate' + 4].to(".emperor-js-1", .5, {opacity: 0}, '-=.5');
                page['animate' + 4].to(".emperor-js-2", .5, {opacity: 0}, '-=.5');
                page['animate' + 4].to(".p4-1", 1, {left: -640});
                $(".p4-2").show();
                page['animate' + 4].to(".p4-2", 1, {left: 53}, '-=.5')
            }
        }, '-=3.2');
        page['animate' + 4].pause();
        page['animate' + 5].to(".heshen-js-name", .3, {delay: .5, autoAlpha: 1});
        page['animate' + 5].to(".heshen-js-1", .4, {delay: .5, autoAlpha: 1});
        page['animate' + 5].to(".heshen-js-2", .4, {autoAlpha: 1});
        page['animate' + 5].to(".tan-s1", 3.5, {delay: .1, marginLeft: -710});
        page['animate' + 5].to(".tan-s2", 3.5, {marginLeft: -615}, '-=3.3');
        page['animate' + 5].to(".tan-s3", 4.5, {marginLeft: -615}, '-=3.1');
        page['animate' + 5].to(".tan-s4", 3.5, {marginLeft: -690}, '-=4.4');
        page['animate' + 5].to(".qian1", .8, {top: 400}, '-=2');
        page['animate' + 5].to(".qian2", .8, {top: 320}, '-=1.9');
        page['animate' + 5].to(".qian3", .8, {top: 430}, '-=2');
        page['animate' + 5].to(".qian4", .8, {top: 450}, '-=1.9');
        page['animate' + 5].to(".qian5", .8, {top: 400}, '-=1.8');
        page['animate' + 5].to(".qian6", .8, {top: 300}, '-=1.7');
        page['animate' + 5].to(".qian7", .8, {top: 300}, '-=1.8');
        page['animate' + 5].to(".qian1", .8, {top: 500, opacity: 0}, '-=1.7');
        page['animate' + 5].to(".qian2", .8, {top: 420, opacity: 0}, '-=1.6');
        page['animate' + 5].to(".qian3", .8, {top: 530, opacity: 0}, '-=1.6');
        page['animate' + 5].to(".qian4", .8, {top: 550, opacity: 0}, '-=1.5');
        page['animate' + 5].to(".qian5", .8, {top: 500, opacity: 0}, '-=1.6');
        page['animate' + 5].to(".qian6", .8, {top: 400, opacity: 0}, '-=1.5');
        page['animate' + 5].to(".qian7", .8, {top: 400, opacity: 0}, '-=1.4');
        page['animate' + 5].pause();
        page['animate' + 6].to(".page6", .1, {
            onStart: function () {
                $(".page4").hide();
                $(".page6").show()
            }
        });
        page['animate' + 6].to(".hs-6", .8, {delay: .3, left: 285}, '-=.1');
        page['animate' + 6].to(".heshen-speak-2", .8, {delay: .5, opacity: 1});
        page['animate' + 6].to(".emperor-speak-2", .8, {delay: .3, opacity: 1});
        page['animate' + 6].pause();
        page['animate' + 7].to(".page7", .3, {
            delay: .5, onStart: function () {
                $(".page6").hide();
                $(".page7").show()
            }
        });
        page['animate' + 7].to(".guang", .3, {scale: 1});
        page['animate' + 7].to(".guang", .1, {opacity: 0});
        page['animate' + 7].to(".zhuyi", .1, {opacity: 0}, '-=.1');
        stagger_options = {display: "block", ease: Elastic.easeInOut};
        page['animate' + 7].staggerTo($(".p-7"), 1, stagger_options, 0.2);
        page['animate' + 7].pause();
        page['animate' + 8].to(".page8", .3, {
            onStart: function () {
                $(".page7").hide();
                $(".page8").show().addClass("p8-bg1")
            }
        });
        page['animate' + 8].to('.title2-8', 1.5, {height: 744, ease: Linear.easeIn});
        page['animate' + 8].to('.title1-8', 1.8, {height: 744, ease: Linear.easeIn});
        page['animate' + 8].to(".leftYun-8", 1.5, {bottom: -812});
        page['animate' + 8].to(".rightYun-8", 1.5, {top: -1008}, '-=1.5');
        page['animate' + 8].to(".title-8", .1, {display: "none"}, '-=1.5');
        page['animate' + 8].to(".page8", .3, {
            onStart: function () {
                $(".page8").removeClass("p8-bg2").addClass("p8-bg2")
            }
        }, '-=1.5');
        page['animate' + 8].pause();
        page['animate' + 9].to(".page9", .3, {
            onStart: function () {
                $(".page8").hide();
                $(".page9").show()
            }
        }, '-=1.5');
        page['animate' + 9].to(".emperor-speak-3", .2, {opacity: 1, left: 13}, '-=.8');
        page['animate' + 9].to(".heshen-speak-3", .2, {delay: .8, opacity: 1, right: 17});
        page['animate' + 9].to(".page9", .5, {
            delay: 1, onStart: function () {
                page['animate' + 9].to(".page9", .5, {rotationY: 90});
                $(".page10").show();
                page['animate' + 9].to(".page10", .5, {rotationY: 0})
            }
        });
        page['animate' + 9].pause();
        page['animate' + 10].to(".p10-zi1", .3, {opacity: 1, scale: 1}, '-=.5');
        page['animate' + 10].to(".p10-zi1", .3, {delay: .3, rotation: 90, left: -70});
        page['animate' + 10].to(".p10-zi2", .3, {opacity: 1, scale: 1}, '-=.3');
        page['animate' + 10].to(".p10-2", .3, {delay: .1, opacity: 1});
        page['animate' + 10].to(".p10-bg-3", .5, {scale: 1}, '-=.3');
        page['animate' + 10].to(".p10-bg-4", .1, {opacity: 1});
        page['animate' + 10].to(".p10-bg-4", .1, {opacity: 0});
        page['animate' + 10].to(".p10-bg-3", .1, {scale: 1}, '-=.3');
        page['animate' + 10].to(".p10-bg -4", .1, {opacity: 1});
        page['animate' + 10].to(".p10-bg-4", .1, {opacity: 0});
        page['animate' + 10].to(".p10-bg-3", .1, {scale: 1}, '-=.3');
        page['animate' + 10].to(".p10-bg-4", .1, {opacity: 1});
        page['animate' + 10].to(".p10-bg-4", .1, {opacity: 0});
        page['animate' + 10].to(".p10-3", .3, {opacity: 1});
        page['animate' + 10].to(".p10-zi3", .3, {delay: .1, opacity: 1, scale: 1}, '-=.5');
        page['animate' + 10].to(".p10-zi3", .3, {textShadow: "5px 5px 5px #fe2399, -5px -5px 5px #00edff", repeat: 3});
        page['animate' + 10].pause();
        page['animate' + 11].to(".page11", .3, {
            onStart: function () {
                $(".page10").hide();
                $(".page11").show()
            }
        });
        page['animate' + 11].to(".i1", .3, {delay: .1, top: 0});
        page['animate' + 11].to(".i4", .3, {bottom: 0});
        page['animate' + 11].to(".p11-zi1", .3, {scale: 1});
        page['animate' + 11].to(".i2", .3, {delay: .2, top: 0});
        page['animate' + 11].to(".i3", .3, {bottom: 0});
        page['animate' + 11].to(".p11-zi1", .3, {scale: 0}, '-=.3');
        page['animate' + 11].to(".p11-zi1", .3, {background: 'url(img/11-zi2.png) no-repeat', scale: 1});
        page['animate' + 11].to(".p11-1", .1, {
            delay: .1, onStart: function () {
                $(".p11-1").hide();
                $(".p11-2").show()
            }
        });
        page['animate' + 11].to(".p11-bg2", 1.2, {scale: 1, ease: Back.easeOut.config(.5)});
        page['animate' + 11].to(".p11-zi2", .5, {opacity: 1, scale: 1, ease: Power1.easeOut}, '-=.7');
        page['animate' + 11].to(".p11-bg2", .5, {delay: .2, top: -1050});
        page['animate' + 11].to(".p11-zi2", .5, {top: -900}, '-=.5');
        page['animate' + 11].to(".p11-bg3", .5, {bottom: 0}, '-=.5');
        page['animate' + 11].to(".p11-zi3", .5, {opacity: 1, scale: 1, ease: Power1.easeOut}, '-=.2');
        page['animate' + 11].to(".p11-bg3", .5, {delay: .1, bottom: -1050});
        page['animate' + 11].to(".p11-zi3", .5, {top: 900}, '-=.5');
        page['animate' + 11].to(".p11-3", .1, {
            onStart: function () {
                $(".p11-2").hide();
                $(".p11-3").show()
            }
        });
        page['animate' + 11].to(".p11-ren", .5, {scale: 1});
        page['animate' + 11].to(".p11-zi6", .5, {delay: .1, opacity: 1, scale: 1});
        page['animate' + 11].to(".xian", .5, {opacity: 1, top: 0, ease: Power4.easeOut});
        page['animate' + 11].to(".ren", .3, {scale: 0});
        page['animate' + 11].to(".xian", .3, {opacity: 0, scaleY: 5}, '-=.3');
        page['animate' + 11].to(".cbd", .5, {opacity: 1, scale: 1}, '-=.2');
        page['animate' + 11].to(".xian", .5, {delay: .1, opacity: 1, scaleY: 1, ease: Power4.easeOut});
        page['animate' + 11].to(".cbd", .3, {opacity: 0});
        page['animate' + 11].to(".xian", .3, {opacity: 0}, '-=.3');
        page['animate' + 11].to(".yunhe", .25, {opacity: 1, scale: 2});
        page['animate' + 11].to(".yunhe", .3, {delay: .1, scale: 1.5});
        page['animate' + 11].to(".yunhe", .3, {delay: .1, scale: 1});
        page['animate' + 11].to(".page12", 1, {
            onStart: function () {
                page['animate' + 11].to(".page11", 1, {top: -1200});
                $(".page12").show();
                page['animate' + 11].to(".page12", 1, {top: 0}, '-=1')
            }
        }, '-=.6');
        page['animate' + 11].pause();
        page['animate' + 12].to(".p12-zi1", .3, {opacity: 1, scale: 1});
        page['animate' + 12].to(".p12-1", .1, {
            delay: .5, onStart: function () {
                $(".p12-1").hide();
                $(".p12-2").show()
            }
        });
        page['animate' + 12].to(".p12-hd2", .5, {marginLeft: 0});
        page['animate' + 12].to(".p12-zi2", .5, {opacity: 1, scale: 1});
        page['animate' + 12].to(".p12-2", .2, {
            delay: .6, onStart: function () {
                $(".p12-2").hide();
                $(".p12-3").show()
            }
        });
        page['animate' + 12].to(".p12-zi3", .5, {opacity: 1, scale: 1});
        page['animate' + 12].to(".p12-guang", .5, {scaleX: 2, repeat: 3});
        page['animate' + 12].to(".p12-3", .1, {
            delay: .3, onStart: function () {
                $(".p12-3").hide();
                $(".p12-4").show()
            }
        });
        page['animate' + 12].to(".p12-hs", .5, {left: 65});
        page['animate' + 12].to(".p12-hs", .5, {delay: .5, left: -675});
        page['animate' + 12].to(".p12-zi4", .5, {opacity: 1, scale: 1});
        page['animate' + 12].to(".p12-zi4", .5, {delay: .5, display: 'none'});
        page['animate' + 12].to(".p12-zi5", .5, {opacity: 1, left: 0, bottom: 0});
        page['animate' + 12].pause();
        page['animate' + 13].to(".page13", .5, {
            onStart: function () {
                $(".page13").show()
            }
        });
        page['animate' + 13].to(".p13-1", .5, {top: 0}, '-=.2');
        page['animate' + 13].to(".p13-zi1", .5, {
            height: 606, onStart: function () {
                $(".page12").hide()
            }
        });
        page['animate' + 13].to(".p13-2", .5, {
            delay: 1, onStart: function () {
                page['animate' + 13].to(".p13-1", .5, {top: 1200});
                $(".p13-2").show()
            }
        });
        page['animate' + 13].to(".p13-2", .5, {top: 0});
        page['animate' + 13].to(".p13-zi2", .5, {height: 655});
        page['animate' + 13].to(".p13-3", .5, {
            delay: 1, onStart: function () {
                page['animate' + 13].to(".p13-2", .5, {top: -1200});
                $(".p13-3").show()
            }
        });
        page['animate' + 13].to(".p13-3", .5, {left: 0});
        page['animate' + 13].to(".p13-zi3", .3, {height: 552});
        page['animate' + 13].to(".p13-4", .5, {
            delay: 1, onStart: function () {
                page['animate' + 13].to(".p13-3", .5, {left: -1200});
                $(".p13-4").show()
            }
        });
        page['animate' + 13].to(".p13-4", .5, {left: 0});
        page['animate' + 13].to(".p13-zi4", .3, {height: 543});
        page['animate' + 13].to(".p13-5", .5, {
            delay: 1, onStart: function () {
                $(".p13-5").show()
            }
        });
        page['animate' + 13].to(".p13-5", .5, {scale: 1});
        page['animate' + 13].to(".p13-zi5", .3, {opacity: 1});
        page['animate' + 13].pause();
        page['animate' + 14].to(".page14", .3, {
            onStart: function () {
                $(".page13").hide();
                $(".page14").show()
            }
        });
        page['animate' + 14].to(".p14-hs", .5, {top: 0, left: 0}, '-=.3');
        page['animate' + 14].to(".p14-bd", .3, {opacity: 1});
        page['animate' + 14].to(".p14-zi1", .3, {opacity: 1});
        page['animate' + 14].to(".p14-2", .1, {
            delay: .3, onStart: function () {
                $(".p14-1").hide();
                $(".p14-2").show()
            }
        });
        stagger_options1 = {display: "block"};
        page['animate' + 14].staggerTo($(".p14-bg2"), 1, stagger_options1, 0.3);
        page['animate' + 14].to(".page15", .1, {
            onStart: function () {
                $(".page14").hide();
                $(".page15").show()
            }
        });
        page['animate' + 14].pause();
        page['animate' + 15].to(".p15-i1", .2, {top: 0, left: 0});
        page['animate' + 15].to(".p15-zi1", .5, {opacity: 1});
        page['animate' + 15].to(".p15-i2", .2, {delay: .1, top: 0, right: 0});
        page['animate' + 15].to(".p15-zi2", .5, {opacity: 1, scale: 1});
        page['animate' + 15].to(".p15-i4", .2, {delay: .1, right: 0, bottom: 0});
        page['animate' + 15].to(".p15-zi3", .5, {opacity: 1});
        page['animate' + 15].to(".p15-i3", .2, {delay: .1, left: 0, bottom: 0});
        page['animate' + 15].to(".p15-zi4", .5, {opacity: 1, scale: 1});
        page['animate' + 15].to(".p15-2", .1, {
            onStart: function () {
                $(".p15-1").hide();
                $(".p15-2").show()
            }
        });
        page['animate' + 15].to(".p15-2", 1.5, {left: -400});
        page['animate' + 15].to(".p15-3", .1, {
            onStart: function () {
                $(".p15-2").hide();
                $(".p15-3").show()
            }
        });
        page['animate' + 15].to(".p15-hd", .3, {left: 0});
        page['animate' + 15].to(".p15-sz", 1, {height: 967});
        page['animate' + 15].to(".p15-jz", 1, {rotationX: 180, top: 950}, '-=1');
        page['animate' + 15].to(".p15-jz", .1, {opacity: 0}, '-=.1');
        page['animate' + 15].to(".p15-tz", .5, {delay: .5, opacity: 1, scale: 1});
        page['animate' + 15].pause();
        page['animate' + 16].to(".page17", .3, {
            onStart: function () {
                $(".page15").hide();
                $(".page17").show()
            }
        });
        page['animate' + 16].to(".huang", 4.5, {left: -604});
        page['animate' + 16].to(".xiao", 4.5, {left: -550}, '-=5');
        page['animate' + 16].to(".he", 4.5, {left: -584}, '-=4.8');
        page['animate' + 16].to(".cheng", 4.5, {left: -496}, '-=4.5');
        page['animate' + 16].to(".shi", 4, {left: -796}, '-=6');
        page['animate' + 16].to(".xiang", 4, {left: -850}, '-=6');
        page['animate' + 16].pause();
        page['animate' + 17].to(".page18", .3, {
            delay: .3, onStart: function () {
                $(".page17").hide();
                $(".page18").show()
            }
        });
        page['animate' + 17].to(".p18-1", .5, {height: 169});
        page['animate' + 17].to(".p18-1", .5, {height: 295});
        page['animate' + 17].to(".p18-zi2", .5, {opacity: 1, scale: 1});
        page['animate' + 17].to(".p18-1", .5, {height: 529});
        page['animate' + 17].to(".p18-2", .1, {
            delay: .8, onStart: function () {
                $(".p18-1").hide();
                $(".p18-2").show()
            }
        });
        page['animate' + 17].to(".p18-zi3", .5, {display: "block"});
        page['animate' + 17].to(".p18-zi4", .5, {
            display: "block", onStart: function () {
                $(".p18-zi3").hide()
            }
        });
        page['animate' + 17].to(".p18-zi5", .4, {
            delay: .5, display: "block", onStart: function () {
                $(".p18-zi4").hide()
            }
        });
        page['animate' + 17].to(".p18-zi6", .4, {
            display: "block", onStart: function () {
                $(".p18-zi5").hide()
            }
        });
        page['animate' + 17].to(".p18-zi7", .4, {
            display: "block", onStart: function () {
                $(".p18-zi6").hide()
            }
        });
        page['animate' + 17].to(".page19", .1, {
            onStart: function () {
                $(".page18").hide();
                $(".page19").show()
            }
        });
        page['animate' + 17].to(".laidianhua", .5, {opacity: 1, scale: .9, repeat: -1});
        page['animate' + 17].pause()
    }

    for (var i = 1; i < $(".main").children().length; i++) {
        page['animate' + i].eventCallback("onComplete", (function (i) {
            var j = i + 1;
            return function () {
                page['animate' + j].play()
            }
        })(i))
    }
    $(".musicicon").on("touchstart", function () {
        if ($(this).hasClass('musicrotate')) {
            music.pause();
            $(this).removeClass("musicrotate")
        } else {
            music.play();
            $(this).addClass("musicrotate")
        }
    })
});