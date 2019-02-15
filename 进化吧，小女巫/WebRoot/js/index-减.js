//女巫类
// 碰撞检测还是有点问题，图片空白部分太多，导致肉眼看不到碰撞
// 障碍物出现有问题，1.出现太慢。 2.出现数量太多
function Ship(ctx) {
    this.ship_src = "images/nvwu1.png";
    gameMonitor.im.loadImage(["images/nvwu1.png"]);
    this.width = 187;
    this.height = 293;
    this.left = gameMonitor.w / 2 - this.width / 2;
    //this.top = gameMonitor.h - 2 * this.height;
    this.top = 798;
    this.player = gameMonitor.im.createImage(this.ship_src);
    //绘制女巫
    this.paint = function () {
        this.T = this.top + 28;
        this.L = this.left + 22;
        this.R = this.left + this.width - 22;
        ctx.drawImage(this.player, this.left, this.top, this.width, this.height);
        //ctx.fillStyle="#ff4a0c";
        //ctx.fillRect(this.left,this.top,this.width,this.height);
        ctx.color = "black";
        ctx.font = "32px Aria";
        ctx.fillText(this.T, this.left + 75, this.top);
        ctx.fillText(this.R, this.left + this.width, this.top + this.height / 2);
        ctx.fillText(parseInt(this.L), this.left - 60, this.top + this.height / 2);
        ctx.restore();
    };
    //setPosition其实就是修改飞船的left和top值，并防止移出屏幕，每次移动完后调用paint方法来重现绘制飞船
    this.setPosition = function (event) {
        var tarL = event.changedTouches[0].clientX;
        this.left = tarL - this.width / 2 - 16;
        if (this.left < 0) {
            this.left = 0;
        }
        if (this.left > 750 - this.width) {
            this.left = 750 - this.width;
        }
    };
    this.controll = function () {
        var _this = this;
        var stage = $('#gamepanel');
        var currentX = this.left,
            currentY = this.top,
            move = false;
        stage.on(gameMonitor.eventType.start, function (event) {
            _this.setPosition(event);
            move = true;
        }).on(gameMonitor.eventType.end, function () {
            move = false;
        }).on(gameMonitor.eventType.move, function (event) {
            event.preventDefault();
            if (move) {
                _this.setPosition(event);
            }
        });
    };
    //碰撞检测吃月饼
    this.eat = function (foodlist) {
        for (var i = foodlist.length - 1; i >= 0; i--) {
            var f = foodlist[i];
            if (f) {
                var l = f.left;
                var lw = f.left + f.width;
                var th = f.top + f.height;
                if (f.type == 0) {
                    th = f.top + f.height - 25;
                }
                if (f.type == 3) {
                    lw = f.left + f.width - 10;
                    th = f.top + f.height - 10;
                }
                console.log(l);
                console.log(lw);
                console.log(th);
                if (this.R > l && this.L < lw && this.T < th) {
                    //if(this.R> f.left&& this.L<f.left+ f.width&& this.T< f.top+ f.height){
                    debugger;
                    foodlist[f.id] = null;
                    if (f.type != 0) {
                        gameMonitor.stop();
                        if (f.type == 1) {
                            $("#fenghao").removeClass().addClass("out_gg");
                        }
                        if (f.type == 2) {
                            $("#fenghao").removeClass().addClass("out_kl");
                        }
                        if (f.type == 3) {
                            $("#fenghao").removeClass().addClass("out_ss");
                        }
                        if (f.type == 4) {
                            $("#fenghao").removeClass().addClass("out_bf");
                        }
                        setTimeout(function(){
                            $('#resultPanel').show();
                        },300);
                    } else {
                        $('#score').text(++gameMonitor.score);
                        if (gameMonitor.score >= 20 && gameMonitor.score < 50) {
                            this.ship_src = "images/nvwu2.png";
                            gameMonitor.im.loadImage(["images/nvwu2.png"]);
                            this.player = gameMonitor.im.createImage(this.ship_src);
                            this.paint();
                        }
                        if (gameMonitor.score >= 50) {
                            this.ship_src = "images/nvwu3.png";
                            gameMonitor.im.loadImage(["images/nvwu3.png"]);
                            this.player = gameMonitor.im.createImage(this.ship_src);
                            this.paint();
                        }
                        if (gameMonitor.score == 100) {
                            gameMonitor.stop();
                            $("#fenghao").hide();
                            $(".success").show();
                            $('#resultPanel').show();
                        }
                    }
                }
            }
        }
    }
}
//障碍物类
function Food(type, left, id) {
    var picSrc, picWidth, picHeight;
    if (type == 1) {
        picSrc = 'images/guiguai.png';
        picWidth = 203;
        picHeight = 197;
    } else if (type == 2) {
        picSrc = 'images/kulou.png';
        picWidth = 142;
        picHeight = 183;
    } else if (type == 3) {
        picSrc = 'images/sishen.png';
        picWidth = 179;
        picHeight = 224;
    } else if (type == 4) {
        picSrc = 'images/bianfu.png';
        picWidth = 236;
        picHeight = 155;
    } else if (type == 0) {
        picSrc = 'images/tang.png';
        picWidth = 195;
        picHeight = 168;
    }
    this.speedUpTime = 300;
    this.id = id;
    this.type = type;
    this.width = picWidth;
    this.height = picHeight;
    this.left = left;

    var randoms = Math.floor(Math.random() * ($(window).height() / 2 - (-10) + 1) + (-10));
    this.top = randoms;
    this.speed = 0.04 * Math.pow(1.2, Math.floor(gameMonitor.time / this.speedUpTime));
    this.loop = 0;
    this.pic = gameMonitor.im.createImage(picSrc);
}
Food.prototype.paint = function (ctx) {
    ctx.drawImage(this.pic, this.left, this.top, this.width, this.height);
    //console.log(this.pic);
    //ctx.fillStyle = "#cccccc";
    //ctx.fillRect(this.left, this.top, this.width, this.height);
    ctx.color = "black";
    ctx.font = "32px Aria";
    ctx.fillText(parseInt(this.top), this.left + 75, this.top);
    ctx.fillText(parseInt(this.left + this.width), this.left + this.width, this.top + this.height / 2);
    ctx.fillText(parseInt(this.left), this.left - 60, this.top + this.height / 2);
    ctx.fillText(parseInt(this.top + this.height), this.left + 75, this.top + this.height + 40);
    ctx.restore();
};
Food.prototype.move = function (ctx) {
    if (gameMonitor.time % this.speedUpTime == 0) {
        this.speed *= 1.2;
    }
    this.top += ++this.loop * this.speed;
    if (this.top > gameMonitor.h) {
        gameMonitor.foodList[this.id] = null;
    } else {
        this.paint(ctx);
    }
};
//图片加载
function ImageMonitor() {
    var imgArray = [];
    return {
        createImage: function (src) {
            return typeof imgArray[src] != 'undefined' ? imgArray[src] : (imgArray[src] = new Image(), imgArray[src].src = src, imgArray[src])
        },
        loadImage: function (arr, callback) {
            for (var i = 0, l = arr.length; i < l; i++) {
                var img = arr[i];
                imgArray[img] = new Image();
                imgArray[img].onload = function () {
                    if (i == l - 1 && typeof callback == 'function') {
                        callback();
                    }
                }
                imgArray[img].src = img
            }
        }
    }
}
var gameMonitor = {
    w: 750,
    h: $(window).height(),
    bgWidth: 750,
    bgHeight: 1206,
    time: 0,
    timmer: null,
    bgSpeed: 5,
    bgloop: 0,
    score: 0,
    im: new ImageMonitor(),
    foodList: [],
    bgDistance: 0,//背景位置
    eventType: {
        start: 'touchstart',
        move: 'touchmove',
        end: 'touchend'
    },
    init: function () {
        var _this = this;
        var canvas = document.getElementById('stage');
        var ctx = canvas.getContext('2d');

        //绘制背景
        var bg = new Image();
        _this.bg = bg;
        bg.onload = function () {
            ctx.drawImage(bg, 0, 0, _this.bgWidth, _this.bgHeight);
        }
        bg.src = 'images/bg.jpg';
        _this.initListener(ctx);
    },
    initListener: function (ctx) {
        var _this = this;
        var body = $(document.body);
        $(document).on(gameMonitor.eventType.move, function (event) {
            event.preventDefault();
        });
        // 再来一次
        body.on(gameMonitor.eventType.start, '.replay', function () {
            $('#resultPanel').hide();
            var canvas = document.getElementById('stage');
            var ctx = canvas.getContext('2d');
            //飞船
            _this.ship = new Ship(ctx);
            //controll方法则是监听了touch事件，计算得出新的位置
            _this.ship.controll();
            _this.reset();
            //动
            _this.run(ctx);
        });
        //开始游戏
        body.on(gameMonitor.eventType.start, '#guidePanel', function () {
            $(".start").hide();
            _this.ship = new Ship(ctx);
            _this.ship.paint();
            _this.ship.controll();
            gameMonitor.run(ctx);
        });
    },
    rollBg: function (ctx) {
        if (this.bgDistance >= this.bgHeight) {
            this.bgloop = 0;
        }
        this.bgDistance = ++this.bgloop * this.bgSpeed;
        ctx.drawImage(this.bg, 0, this.bgDistance - this.bgHeight, this.bgWidth, this.bgHeight);
        ctx.drawImage(this.bg, 0, this.bgDistance, this.bgWidth, this.bgHeight);
    },
    run: function (ctx) {
        var _this = gameMonitor;
        ctx.clearRect(0, 0, _this.bgWidth, _this.bgHeight);
        _this.rollBg(ctx);
        //绘制飞船
        _this.ship.paint();
        //产生月饼
        _this.genorateFood();

        //绘制月饼
        for (i = _this.foodList.length - 1; i >= 0; i--) {
            var f = _this.foodList[i];
            if (f) {
                f.paint(ctx);
                f.move(ctx);
            }
        }
        _this.ship.eat(_this.foodList);

        _this.timmer = setTimeout(function () {
            gameMonitor.run(ctx);
        }, Math.round(1000 / 60));
        _this.time++;
    },
    stop: function () {
        var _this = this;
        setTimeout(function () {
            clearTimeout(_this.timmer);
        }, 0);
        return false;
    },
    genorateFood: function () {
        var genRate = 50; //产生月饼的频率
        var random = Math.random();
        if (random * genRate > genRate - 1) {
            var leftArr = [124, 300, 479];
            var left = leftArr[Math.floor(Math.random() * leftArr.length)];
            var typeArr = [0, 1, 2, 3, 4];
            //var typeArr = [0, 3];
            var type = typeArr[Math.floor(Math.random() * typeArr.length)];
            var id = this.foodList.length;
            var f = new Food(type, left, id);
            this.foodList.push(f);
        }
    },
    //重置
    reset: function () {
        // debugger;
        this.foodList = [];
        this.bgloop = 0;
        this.score = 0;
        this.timmer = null;
        this.time = 0;
        $('#score').text(this.score);
    }
};
gameMonitor.init();
