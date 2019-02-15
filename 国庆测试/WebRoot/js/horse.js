function Horse(obj,maxFrame) {
    // debugger;
    this.stopInterval = null;
    this.w_index =0;
    this.maxFrame = maxFrame;
    this.obj = obj;
    this.time = 250
}
Horse.prototype = {
    constructor: Horse,
    walk:function () {
        // debugger;
        var _this = this;
        _this.stopInterval = setInterval(function () {
            // debugger;
            _this.w_index++;
            $(''+_this.obj+'>img').attr({'src':'img/2_'+_this.w_index+'.png'});
            if(_this.w_index>_this.maxFrame){
                _this.w_index=0;
            }
        },_this.time);
    },
    pause:function () {
        debugger;
        var _this = this;
        clearInterval(_this.stopInterval)
    },
    btn: function () {
        var _this = this;
        _this.timestopInterval-=50;

    }
}