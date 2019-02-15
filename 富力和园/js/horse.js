function Horse(obj,maxFrame) {
    this.stopInterval = null;
    this.w_index = 0;
    this.maxFrame = maxFrame;
    this.obj = obj;
    this.time = 100
}
Horse.prototype = {
    constructor: Horse,
    walk:function () {
        var _this = this;
        _this.stopInterval = setInterval(function () {
            _this.w_index++;
            $('+_this.obj+').fadeIn(1000);

            $(''+_this.obj+'>img').attr({'src':'images/horse/'+_this.w_index+'.png'});
            if(_this.w_index>_this.maxFrame){
                _this.w_index=0;
            }
        },_this.time);
    },
    pause:function () {
        var _this = this
        clearInterval(_this.stopInterval)
    },
    btn: function () {
        var _this = this
        _this.timestopInterval-=50;

    }
}