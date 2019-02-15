window.requestNextAnimationFrame = (function () {
    var originalWebkitRequestAnimationFrame = undefined, wrapper = undefined, callback = undefined, geckoVersion = 0,
        userAgent = navigator.userAgent, index = 0, self = this;
    if (window.webkitRequestAnimationFrame) {
        wrapper = function (time) {
            if (time === undefined) {
                time = +new Date()
            }
            self.callback(time)
        };
        originalWebkitRequestAnimationFrame = window.webkitRequestAnimationFrame;
        window.webkitRequestAnimationFrame = function (callback, element) {
            self.callback = callback;
            originalWebkitRequestAnimationFrame(wrapper, element)
        }
    }
    if (window.mozRequestAnimationFrame) {
        index = userAgent.indexOf('rv:');
        if (userAgent.indexOf('Gecko') != -1) {
            geckoVersion = userAgent.substr(index + 3, 3);
            if (geckoVersion === '2.0') {
                window.mozRequestAnimationFrame = undefined
            }
        }
    }
    return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function (callback, element) {
            var start, finish;
            window.setTimeout(function () {
                start = +new Date();
                callback(start);
                finish = +new Date();
                self.timeout = 1000 / 60 - (finish - start)
            }, self.timeout)
        }
})();