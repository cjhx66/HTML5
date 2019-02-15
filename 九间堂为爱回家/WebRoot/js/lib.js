var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    paginationClickable: true,
    direction: 'vertical',
    onInit:function(swiper){
        $(".p1-2").css({"animation":"p1-2 3s 1.5s forwards",});
        $(".p1-2").css({"-webkit-animation":"p1-2 3s 1.5s forwards",});
        $(".p1").css({"animation":"p1 2s 1s forwards",});
        $(".p1").css({"-webkit-animation":"p1 2s 1s forwards",});
        $(".p1-3").css({"animation":"p1-3 3s 2s forwards",});
        $(".p1-3").css({"-webkit-animation":"p1-3 3s 2s forwards",});
    },
    onSlideChangeStart:function(swiper){
    	if (swiper.activeIndex==0) {
            $(".p1-2").css({"animation":"p1-2 3s 1.5s forwards",});
            $(".p1-2").css({"-webkit-animation":"p1-2 3s 1.5s forwards",});
            $(".p1").css({"animation":"p1 2s 1s forwards",});
            $(".p1").css({"-webkit-animation":"p1 2s 1s forwards",});
            $(".p1-3").css({"animation":"p1-3 3s 2s forwards",});
            $(".p1-3").css({"-webkit-animation":"p1-3 3s 2s forwards",});
    	}else{
            $(".p1-2").css({"animation":"",});
            $(".p1-2").css({"-webkit-animation":"",});
            $(".p1").css({"animation":"",});
            $(".p1").css({"-webkit-animation":"",});
            $(".p1-3").css({"animation":"",});
            $(".p1-3").css({"-webkit-animation":"",});
    	}
    	if (swiper.activeIndex==1) {
            $(".p2-2").css({"animation":"p2-2 3s 1s forwards",});
            $(".p2-2").css({"-webkit-animation":"p2-2 3s 1s forwards",});
            $(".p2").css({"animation":"p2 2s 0.5s forwards",});
            $(".p2").css({"-webkit-animation":"p2 2s 0.5s forwards",});
    	}else{
            $(".p2-2").css({"animation":"",});
            $(".p2-2").css({"-webkit-animation":"",});
            $(".p2").css({"animation":"",});
            $(".p2").css({"-webkit-animation":"",});
    	}
    	if (swiper.activeIndex==2) {
            $(".p3-2").css({"animation":"p3-2 3s 1s forwards",});
            $(".p3-2").css({"-webkit-animation":"p3-2 3s 1s forwards",});
            $(".p3").css({"animation":"p3 2s 0.5s forwards",});
            $(".p3").css({"-webkit-animation":"p3 2s 0.5s forwards",});
    	}else{
            $(".p3-2").css({"animation":"",});
            $(".p3-2").css({"-webkit-animation":"",});
            $(".p3").css({"animation":"",});
            $(".p3").css({"-webkit-animation":"",});
    	}
    	if (swiper.activeIndex==3) {
            $(".p4").css({"animation":"p4 2s 0.5s forwards",});
            $(".p4").css({"-webkit-animation":"p4 2s 0.5s forwards",});
    	}else{
            $(".p4").css({"animation":"",});
            $(".p4").css({"-webkit-animation":"",});
    	}
    	if (swiper.activeIndex==4) {
            $(".p5-2").css({"animation":"p5-2 3s 1s forwards",});
            $(".p5-2").css({"-webkit-animation":"p5-2 3s 1s forwards",});
            $(".p5").css({"animation":"p5 2s 0.5s forwards",});
            $(".p5").css({"-webkit-animation":"p5 2s 0.5s forwards",});
    	}else{
            $(".p5-2").css({"animation":"",});
            $(".p5-2").css({"-webkit-animation":"",});
            $(".p5").css({"animation":"",});
            $(".p5").css({"-webkit-animation":"",});
    	}
        if (swiper.activeIndex==5) {
            $(".p6").css({"animation":"p6 2s 0.5s forwards",});
            $(".p6").css({"-webkit-animation":"p6 2s 0.5s forwards",});
        }else{
            $(".p6").css({"animation":"",});
            $(".p6").css({"-webkit-animation":"",});
        }
        if (swiper.activeIndex==6) {
            $(".p7").css({"animation":"p7 2s 0.5s forwards",});
            $(".p7").css({"-webkit-animation":"p7 2s 0.5s forwards",});
        }else{
            $(".p7").css({"animation":"",});
            $(".p7").css({"-webkit-animation":"",});
        }
    }
});