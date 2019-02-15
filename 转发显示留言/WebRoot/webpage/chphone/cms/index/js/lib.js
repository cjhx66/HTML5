var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    paginationClickable: true,
    direction: 'vertical',
    onInit: function (swiper) {
        $(".p1-2").css({"animation": "p1-2 1s .2s forwards",});
        $(".p1-2").css({"-webkit-animation": "p1-2 1s .2s forwards",});
        $(".p1").css({"animation": "p1 2s 1s forwards",});
        $(".p1").css({"-webkit-animation": "p1 2s 1s forwards",});
        $(".p1-3").css({"animation": "p1-3 1.5s .5s forwards",});
        $(".p1-3").css({"-webkit-animation": "p1-3 1.5s .5s forwards",});
        $(".p1-4").css({"animation": "p1-4 2.2s 1s forwards",});
        $(".p1-4").css({"-webkit-animation": "p1-4 2.2s 1s forwards",});
        $(".p1-6").css({"animation": "p1-6 3s 2s forwards",});
        $(".p1-6").css({"-webkit-animation": "p1-6 3s 2s forwards",});
    },
    onSlideChangeStart: function (swiper) {
        if (swiper.activeIndex == 0) {
            $(".p1-2").css({"animation": "p1-2 1s .2s forwards",});
            $(".p1-2").css({"-webkit-animation": "p1-2 1s .2s forwards",});
            $(".p1").css({"animation": "p1 2s 1s forwards",});
            $(".p1").css({"-webkit-animation": "p1 2s 1s forwards",});
            $(".p1-3").css({"animation": "p1-3 1.5s .5s forwards",});
            $(".p1-3").css({"-webkit-animation": "p1-3 1.5s .5s forwards",});
            $(".p1-4").css({"animation": "p1-4 2.2s 1s forwards",});
            $(".p1-4").css({"-webkit-animation": "p1-4 2.2s 1s forwards",});
            $(".p1-6").css({"animation": "p1-6 3s 2s forwards",});
            $(".p1-6").css({"-webkit-animation": "p1-6 3s 2s forwards",});
        } else {
            $(".p1-2").css({"animation": "",});
            $(".p1-2").css({"-webkit-animation": "",});
            $(".p1").css({"animation": "",});
            $(".p1").css({"-webkit-animation": "",});
            $(".p1-3").css({"animation": "",});
            $(".p1-3").css({"-webkit-animation": "",});
            $(".p1-4").css({"animation": "",});
            $(".p1-4").css({"-webkit-animation": "",});
            $(".p1-6").css({"animation": "",});
            $(".p1-6").css({"-webkit-animation": "",});
        }
        if (swiper.activeIndex == 1) {
            $(".p2-2").css({"animation": "p2-2 3s 1.5s forwards",});
            $(".p2-2").css({"-webkit-animation": "p2-2 3s 1.5s forwards",});
            $(".p2").css({"animation": "p2 2s 1s forwards",});
            $(".p2").css({"-webkit-animation": "p2 2s 1s forwards",});
            $(".p2-3").css({"animation": "p2-3 1.5s .5s forwards",});
            $(".p2-3").css({"-webkit-animation": "p2-3 1.5s .5s forwards",});
            $(".p2-4").css({"animation": "p2-4 1.5s 1.5s forwards",});
            $(".p2-4").css({"-webkit-animation": "p2-4 1.5s 1.5s forwards",});
            $(".p2-5").css({"animation": "p2-5 1s 2s forwards",});
            $(".p2-5").css({"-webkit-animation": "p2-5 1s 2s forwards",});
            $(".p2-6").css({"animation": "p2-6 3s 2s forwards",});
            $(".p2-6").css({"-webkit-animation": "p2-6 3s 2s forwards",});
            $(".p2-7").css({"animation": "p2-7 3s 2s forwards",});
            $(".p2-7").css({"-webkit-animation": "p2-7 3s 2s forwards",});
        } else {
            $(".p2-2").css({"animation": "",});
            $(".p2-2").css({"-webkit-animation": "",});
            $(".p2").css({"animation": "",});
            $(".p2").css({"-webkit-animation": "",});
            $(".p2-3").css({"animation": "",});
            $(".p2-3").css({"-webkit-animation": "",});
            $(".p2-4").css({"animation": "",});
            $(".p2-4").css({"-webkit-animation": "",});
            $(".p2-5").css({"animation": "",});
            $(".p2-5").css({"-webkit-animation": "",});
            $(".p2-6").css({"animation": "",});
            $(".p2-6").css({"-webkit-animation": "",});
            $(".p2-7").css({"animation": "",});
            $(".p2-7").css({"-webkit-animation": "",});
        }
        if (swiper.activeIndex == 2) {
            $(".p3").css({"animation": "p3 2s 1s forwards",});
            $(".p3").css({"-webkit-animation": "p3 2s 1s forwards",});
            $(".p3-3").css({"animation": "p3-3 1.5s .5s forwards",});
            $(".p3-3").css({"-webkit-animation": "p3-3 1.5s .5s forwards",});
            $(".p3-4").css({"animation": "p3-4 2.5s 1.5s forwards",});
            $(".p3-4").css({"-webkit-animation": "p3-4 2.5s 1.5s forwards",});
            $(".p3-5").css({"animation": "p3-5 3s 2s forwards",});
            $(".p3-5").css({"-webkit-animation": "p3-5 3s 2s forwards",});
            $(".p3-6").css({"animation": "p3-6 3s 2s forwards",});
            $(".p3-6").css({"-webkit-animation": "p3-6 3s 2s forwards",});
        } else {
            $(".p3").css({"animation": "",});
            $(".p3").css({"-webkit-animation": "",});
            $(".p3-3").css({"animation": "",});
            $(".p3-3").css({"-webkit-animation": "",});
            $(".p3-4").css({"animation": "",});
            $(".p3-4").css({"-webkit-animation": "",});
            $(".p3-5").css({"animation": "",});
            $(".p3-5").css({"-webkit-animation": "",});
            $(".p3-6").css({"animation": "",});
            $(".p3-6").css({"-webkit-animation": "",});
        }
        if (swiper.activeIndex == 3) {
            $(".p4").css({"animation": "p4 2s 1s forwards",});
            $(".p4").css({"-webkit-animation": "p4 2s 1s forwards",});
            $(".p4-3").css({"animation": "p4-3 1.5s .5s forwards",});
            $(".p4-3").css({"-webkit-animation": "p4-3 1.5s .5s forwards",});
            $(".p4-4").css({"animation": "p4-4 2s 1s forwards",});
            $(".p4-4").css({"-webkit-animation": "p4-4 2s 1s forwards",});
            $(".p4-5").css({"animation": "p4-5 3s 2s forwards",});
            $(".p4-5").css({"-webkit-animation": "p4-5 3s 2s forwards",});
        } else {
            $(".p4").css({"animation": "",});
            $(".p4").css({"-webkit-animation": "",});
            $(".p4-3").css({"animation": "",});
            $(".p4-3").css({"-webkit-animation": "",});
            $(".p4-4").css({"animation": "",});
            $(".p4-4").css({"-webkit-animation": "",});
            $(".p4-5").css({"animation": "",});
            $(".p4-5").css({"-webkit-animation": "",});
        }
        if (swiper.activeIndex == 4) {
            $(".p5").css({"animation": "p5 2s 1s forwards",});
            $(".p5").css({"-webkit-animation": "p5 2s 1s forwards",});
            $(".p5-3").css({"animation": "p5-3 1.5s .5s forwards",});
            $(".p5-3").css({"-webkit-animation": "p5-3 1.5s .5s forwards",});
            $(".p5-4").css({"animation": "p5-4 2s 1.5s forwards",});
            $(".p5-4").css({"-webkit-animation": "p5-4 2s 1.5s forwards",});
            $(".p5-5").css({"animation": "p5-5 3s 2s forwards",});
            $(".p5-5").css({"-webkit-animation": "p5-5 3s 2s forwards",});
        } else {
            $(".p5").css({"animation": "",});
            $(".p5").css({"-webkit-animation": "",});
            $(".p5-3").css({"animation": "",});
            $(".p5-3").css({"-webkit-animation": "",});
            $(".p5-4").css({"animation": "",});
            $(".p5-4").css({"-webkit-animation": "",});
            $(".p5-5").css({"animation": "",});
            $(".p5-5").css({"-webkit-animation": "",});
        }
        if (swiper.activeIndex == 5) {
            $(".p6-txt1").css({"animation": "p6-txt1 2s forwards",});
            $(".p6-txt1").css({"-webkit-animation": "p6-txt1 2s forwards",});
            $(".p6-bg").css({"-webkit-animation": "p6-bg 2s 1s forwards",});
            $(".p6-bg").css({"animation": "p6-bg 2s 1s forwards",});
            $(".p6-txt2").css({"animation": "p6-txt2 2s 0.5s forwards",});
            $(".p6-txt2").css({"-webkit-animation": "p6-txt2 2s 0.5s forwards",});
            $(".p6-happy").css({"animation": "p6-happy 0.5s 1.5s forwards",});
            $(".p6-happy").css({"-webkit-animation": "p6-happy 0.5s 1.5s forwards",});
        } else {
            $(".p6-txt1").css({"animation": ""});
            $(".p6-txt1").css({"-webkit-animation": ""});
            $(".p6-bg").css({"animation": ""});
            $(".p6-bg").css({"-webkit-animation": ""});
            $(".p6-txt2").css({"animation": ""});
            $(".p6-txt2").css({"-webkit-animation": ""});
            $(".p6-happy").css({"animation": ""});
            $(".p6-happy").css({"-webkit-animation": ""});
        }
        if (swiper.activeIndex == 6) {
            $(".p7-txt1").css({"animation": "p7-txt1 2s forwards",});
            $(".p7-txt1").css({"-webkit-animation": "p7-txt1 2s forwards",});
            $(".p7-bg").css({"-webkit-animation": "p7-bg 2s 1s forwards",});
            $(".p7-bg").css({"animation": "p7-bg 2s 1s forwards",});
            $(".p7-happy").css({"animation": "p7-happy 0.5s 1.5s forwards",});
            $(".p7-happy").css({"-webkit-animation": "p7-happy 0.5s 1.5s forwards",});
            $(".p7-hua").css({"animation": "p7-hua 2s 1.5s forwards",});
            $(".p7-hua").css({"-webkit-animation": "p7-hua 2s 1.5s forwards",});
        } else {
            $(".p7-txt1").css({"animation": ""});
            $(".p7-txt1").css({"-webkit-animation": ""});
            $(".p7-bg").css({"animation": ""});
            $(".p7-bg").css({"-webkit-animation": ""});
            $(".p7-happy").css({"animation": ""});
            $(".p7-happy").css({"-webkit-animation": ""});
            $(".p7-hua").css({"animation": ""});
            $(".p7-hua").css({"-webkit-animation": ""});
        }
        if (swiper.activeIndex == 7) {
            $(".p8-txt1").css({"animation": "p8-txt1 1s forwards",});
            $(".p8-txt1").css({"-webkit-animation": "p8-txt1 1s forwards",});
            $(".p8-txt2").css({"animation": "p8-txt2 0.5s 1s forwards",});
            $(".p8-txt2").css({"-webkit-animation": "p8-txt2 0.5s 1s forwards",});
        } else {
            $(".p8-txt1").css({"animation": ""});
            $(".p8-txt1").css({"-webkit-animation": ""});
        }
        if (swiper.activeIndex == 8) {

        } else {

        }
        if (swiper.activeIndex == 9) {
            $(".p11-logo").css({"animation": "p11-logo 2s forwards",});
            $(".p11-logo").css({"-webkit-animation": "p11-logo 2s forwards",});
            $(".p10-happy").css({"animation": "p11-logo 0.5s 0.5s forwards",});
            $(".p10-happy").css({"-webkit-animation": "p11-logo 0.5s 0.5s forwards",});
            $(".p11-txt1").css({"animation": "p11-txt1 2s 1s forwards",});
            $(".p11-txt1").css({"-webkit-animation": "p11-txt1 2s 1s forwards",});
            $(".p11-txt2").css({"animation": "p11-txt2 2s 1s forwards"});
            $(".p11-txt2").css({"-webkit-animation": "p11-txt2 2s 1s forwards"});
            $(".p11-xian").css({"animation": "p11-xian 0.5s 1.5s forwards"});
            $(".p11-xian").css({"-webkit-animation": "p11-xian 0.5s 1.5s forwards"});
            $(".p11-txt3").css({"animation": "p11-txt3 1s 2.5s forwards"});
            $(".p11-txt3").css({"-webkit-animation": "p11-txt3 1s 2.5s forwards"});
        } else {
            $(".p11-logo").css({"animation": ""});
            $(".p11-logo").css({"-webkit-animation": ""});
            $(".p11-txt1").css({"animation": ""});
            $(".p11-txt1").css({"-webkit-animation": ""});
            $(".p11-happy").css({"animation": ""});
            $(".p11-happy").css({"-webkit-animation": ""});
            $(".p11-txt1").css({"animation": ""});
            $(".p11-txt1").css({"animation": ""});
            $(".p11-txt2").css({"animation": ""});
            $(".p11-txt2").css({"-webkit-animation": ""});
            $(".p11-xian").css({"animation": ""});
            $(".p11-xian").css({"-webkit-animation": ""});
            $(".p11-txt3").css({"animation": ""});
            $(".p11-txt3").css({"-webkit-animation": ""});
        }
    }
});