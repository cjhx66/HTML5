function Ship(ctx) {
    this.ship_src1 = "images/nvwu1.png";
    this.ship_src2 = "images/nvwu2.png";
    this.ship_src3 = "images/nvwu3.png";
    gameMonitor.im.loadImage(["images/nvwu1.png"]);
    gameMonitor.im.loadImage(["images/nvwu2.png"]);
    gameMonitor.im.loadImage(["images/nvwu3.png"]);
    this.width = 151;
    this.height = 237;
    this.left = gameMonitor.w / 2 - this.width / 2;
    this.top = 840;
    this.player = gameMonitor.im.createImage(this.ship_src1);

    //绘制女巫
    this.paint = function () {
        this.T = this.top + 50;
        this.L = this.left + 50;
        this.R = this.left + this.width - 50;
        this.B = this.top + this.height - 50;
        ctx.drawImage(this.player, this.left, this.top, this.width, this.height);
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
        var move = false;
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
                if (this.R > f.left && this.L < f.left + f.width && this.T < f.top + f.height && this.B > f.top) {
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
                        $('#resultPanel').show();
                    } else {
                        $('#score').text(++gameMonitor.score);
                        if (gameMonitor.score == 20) {
                            $(".gameTisi").show();
                            setTimeout(function () {
                                $(".gameTisi").hide();
                            }, 800);
                        }
                        if (gameMonitor.score >= 20 && gameMonitor.score < 50) {
                            this.width = 159;
                            this.height = 265;
                            this.player = gameMonitor.im.createImage(this.ship_src2);
                        }
                        if (gameMonitor.score == 50) {
                            $(".gameTisi").removeClass("gameTisi_20").addClass("gameTisi_50").show();
                            setTimeout(function () {
                                $(".gameTisi").hide();
                            }, 800);
                        }
                        if (gameMonitor.score >= 50) {
                            this.width = 169;
                            this.height = 260;
                            this.player = gameMonitor.im.createImage(this.ship_src3);
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
        picWidth = 124;
        picHeight = 124;
    } else if (type == 2) {
        picSrc = 'images/kulou.png';
        picWidth = 92;
        picHeight = 119;
    } else if (type == 3) {
        picSrc = 'images/sishen.png';
        picWidth = 103;
        picHeight = 110;
    } else if (type == 4) {
        picSrc = 'images/bianfu.png';
        picWidth = 135;
        picHeight = 99;
    } else if (type == 0) {
        picSrc = 'images/tang.png';
        picWidth = 112;
        picHeight = 96;
    }
    this.id = id;
    this.type = type;
    this.width = picWidth;
    this.height = picHeight;
    this.left = left;
    this.top = -118;
    this.speed = gameMonitor.bgSpeed;
    this.loop = 0;
    this.pic = gameMonitor.im.createImage(picSrc);
}
Food.prototype.paint = function (ctx) {
    ctx.drawImage(this.pic, this.left, this.top, this.width, this.height);
};
Food.prototype.move = function (ctx) {
    if (gameMonitor.score >= 50) {
        this.speed = 13;
    } else if (gameMonitor.score >= 20) {
        this.speed = 10;
    }
    this.top = ++this.loop * this.speed;
    if (this.top > gameMonitor.h) {
        gameMonitor.foodList[this.id] = null;
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
                };
                imgArray[img].src = img
            }
        }
    }
}
var gameMonitor = {
    w: 750,
    h: $(window).height(),
    bgWidth: 750,
    bgHeight: 2411,
    time: 0,
    timmer: null,
    bgSpeed: 7,
    bgloop: 0,
    score: 18,
    speedUpTime: 60,
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
        bg.src = 'images/bg.png';
        bg.onload = function () {
            ctx.drawImage(bg, 0, 0, _this.bgWidth, _this.bgHeight);
        };
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
            $(".gz").removeClass("gz_1").addClass("gz_2").show();
        });
        body.on(gameMonitor.eventType.start, '.gz_2', function () {
            $(".gz").hide();
            $(".audio")[0].play();
            // $("#fenghao").show();
            $(".success").hide();
            var canvas = document.getElementById('stage');
            var ctx = canvas.getContext('2d');
            _this.ship = new Ship(ctx);
            // //controll方法则是监听了touch事件，计算得出新的位置
            _this.ship.controll();
            _this.reset();
            _this.run(ctx);
        });
        //开始游戏
        body.on(gameMonitor.eventType.start, '#guidePanel', function () {
            $(".start").hide();
        });
        body.on(gameMonitor.eventType.start, '.gz_1', function () {
            $(".gz").hide();
            $(".musicicon").show();
            $(".audio")[0].play();
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
        if (this.score >= 50) {
            this.bgSpeed = 13;
        } else if (this.score >= 20) {
            this.bgSpeed = 10;
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
        $(".audio")[0].pause();
        $(".musicicon").hide();
        var _this = this;
        setTimeout(function () {
            clearTimeout(_this.timmer);
        }, 0);
        return false;
    },
    clear: function () {
        this.speedUpTime = 0;
    },
    genorateFood: function () {
        if (this.time % this.speedUpTime == 0) {
            if (this.score >= 50) {
                this.clear();
                this.speedUpTime = 30;
            } else if (this.score >= 20) {
                this.clear();
                this.speedUpTime = 42;
            }
            var leftArr = [125, 145 + 174, 165 + 174 * 2];
            var arr = [];
            for (var i = 0; i < 3; i++) {
                arr.push(i);
            }
            arr.sort(function () {
                return 0.5 - Math.random()
            });
            arr.length = 3;
            var randomNum = Math.floor(Math.random() * 3);
            var left1 = leftArr[arr[0]];
            var left2 = leftArr[arr[1]];
            var left3 = leftArr[arr[2]];
            var typeArr = [0, 1, 2, 3, 4, 0];
            var type1 = typeArr[Math.floor(Math.random() * typeArr.length)];
            var type2 = typeArr[Math.floor(Math.random() * typeArr.length)];
            var type3 = typeArr[Math.floor(Math.random() * typeArr.length)];
            var id1 = this.foodList.length;
            var id2 = id1 + 1;
            var id3 = id2 + 1;
            var f1 = new Food(type1, left1, id1);
            var f2 = new Food(type2, left2, id2);
            var f3 = new Food(type3, left3, id3);
            if (randomNum == 0) {
                this.foodList.push(f1);
                this.foodList.push(f2);
            } else if (randomNum == 1) {
                this.foodList.push(f1);
            } else {
                if (type1 == 0 ) {
                    this.foodList.push(f1);
                    this.foodList.push(f2);
                    this.foodList.push(f3);
                }
            }
        }
    },
    //重置
    reset: function () {
        this.foodList = [];
        this.bgloop = 0;
        this.score = 18;
        this.timmer = null;
        this.time = 0;
        this.bgSpeed = 7;
        this.speedUpTime = 60;
        $('#score').text(this.score);
    }
};
gameMonitor.init();
