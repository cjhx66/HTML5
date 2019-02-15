function Game() {
    var canvas = document.querySelector('.canvas');
    var gamepanel = document.getElementById('gamepanel');
    var ctx = canvas.getContext('2d');
    var canvas_width = window.innerWidth;
    var canvas_height = window.innerHeight;
    canvas.width = canvas_width;
    canvas.height = canvas_height;
    var arcX = canvas_width / 2;
    var arcY = canvas_height * 0.24 + 170;
    var im = new ImageMonitor();
    var big_img = "images/zhuan.png";
    var big = im.createImage(big_img);
    var waitTop = canvas_height * 0.52;
    var waitBTop = canvas_height * 0.68;
    var level = 1;
    var isOver = false;
    var isPause = false;
    var isClick = false;
    var time = 0;
    var interval = null;
    var angle = 0;
    var waitNum, rotateAngle, ballNum, angleNum;
    var str_time = [];
    var flag = false;
    var balls = [];
    var waitBalls = [];
    var levelCycles = [];
    var levelTime = [];
    var quanshu = 1;
    var LevelSpeed = [
        {
            "speed": 1.2,
            "waitNum": 6,
            "ballNum": 0,
            "angle": 120,//角度->暂停
        },
        {
            "speed": 1.2,
            "waitNum": 6,
            "ballNum": 3,
            "angle": 110,//角度->暂停
        },
        {
            "speed": 1.2,
            "waitNum": 6,
            "ballNum": 5,
            "angle": 100,//角度->暂停
        }
    ];
    var fei = [
        {
            "img": "images/fei/fei_1.png",
            "img_z": "images/fei/fei_z1.png",
            "width": 88,
            "height": 69,
            "z_width": 66 * 0.8,
            "z_height": 147 * 0.8,
            "top": 0
        }, {
            "img": "images/fei/fei_2.png",
            "img_z": "images/fei/fei_z2.png",
            "width": 88,
            "height": 74,
            "z_width": 67 * 0.8,
            "z_height": 163 * 0.8,
            "top": 69
        }, {
            "img": "images/fei/fei_3.png",
            "img_z": "images/fei/fei_z3.png",
            "width": 88,
            "height": 67,
            "z_width": 71 * 0.8,
            "z_height": 170 * 0.8,
            "top": 143
        }, {
            "img": "images/fei/fei_4.png",
            "img_z": "images/fei/fei_z4.png",
            "width": 88,
            "height": 63,
            "z_width": 67 * 0.8,
            "z_height": 139 * 0.8,
            "top": 143 + 67
        }, {
            "img": "images/fei/fei_5.png",
            "img_z": "images/fei/fei_z5.png",
            "width": 88,
            "height": 69,
            "z_width": 67 * 0.8,
            "z_height": 165 * 0.8,
            "top": 143 + 67 + 63
        }, {
            "img": "images/fei/fei_6.png",
            "img_z": "images/fei/fei_z6.png",
            "width": 88,
            "height": 88,
            "z_width": 85 * 0.8,
            "z_height": 177 * 0.8,
            "top": 143 + 67 + 63 + 69
        },
    ];
    var num = [
        {
            "img": im.createImage("images/time/0.png"),
        }, {
            "img": im.createImage("images/time/1.png"),
        }, {
            "img": im.createImage("images/time/2.png"),
        }, {
            "img": im.createImage("images/time/3.png"),
        }, {
            "img": im.createImage("images/time/4.png"),
        }, {
            "img": im.createImage("images/time/5.png"),
        }, {
            "img": im.createImage("images/time/6.png"),
        }, {
            "img": im.createImage("images/time/7.png"),
        }, {
            "img": im.createImage("images/time/8.png"),
        }, {
            "img": im.createImage("images/time/9.png"),
        }];
    function setTime() {
        interval = setInterval(function () {
            if (time > 0) {
                time--;
                var str = String(time).split('');
                if (time < 10) {
                    str.unshift("0");
                }
                paintTime(str);
            } else {
                clearInterval(interval);
                if (!isOver) {
                    isOver = true;
                    Over();
                }
            }
            if (level == 1) {
                if (time < 15) {
                    $(".score-wrap").hide();
                }
            }
            else if (time < 30) {
                $(".score-wrap").hide();
            }
        }, 1000);
    }
    function paintTime(str) {
        ctx.clearRect(arcX - 41, canvas_height * 0.07, 82, 57);
        if (str == undefined) {
            ctx.drawImage(num[3].img, arcX - 41, canvas_height * 0.07, 41 * 0.8, 57 * 0.8);
            ctx.drawImage(num[0].img, arcX, canvas_height * 0.07, 41 * 0.8, 57 * 0.8);
        } else {
            ctx.drawImage(num[str[0]].img, arcX - 41, canvas_height * 0.07, 41 * 0.8, 57 * 0.8);
            ctx.drawImage(num[str[1]].img, arcX, canvas_height * 0.07, 41 * 0.8, 57 * 0.8);
        }
    }
    function ballBig(ang) {
        if (ang == undefined) {
            angle += rotateAngle;
            if (angle >= 360) angle = 0;
            ctx.rotate(angle * Math.PI / 180);
        } else {
            ctx.rotate(ang * Math.PI / 180);
        }
        ctx.drawImage(big, -170, -170, 340, 340);
    }
    function ballWait() {
        ctx.clearRect(25, waitTop, 88, 540);
        ctx.save();
        if (waitBalls.length != 0) {
            waitBall(waitBalls[0]);
        } else {
            waitBall();
        }
        waitBalls.forEach(function (item, index) {
            ctx.save();
            ctx.drawImage(item.img, 25, (waitTop + item.top), item.width, item.height);
            ctx.restore();
        });
        ctx.restore();
        if (!isOver) {
            window.requestAnimationFrame(ballWait);
        }
    };
    function waitBall(item) {
        if (item == undefined) {
            ctx.clearRect(arcX - 42.5, waitBTop, 85, 177);
            ctx.save();
        } else {
            ctx.clearRect(arcX - (item.z_width / 2), waitBTop, item.z_width, item.z_height);
            ctx.save();
            ctx.drawImage(item.img_z, arcX - (item.z_width / 2), waitBTop, item.z_width, item.z_height);
        }
    }
    function ballRotate() {
        ctx.clearRect(arcX - 170 - 141.6, arcY - 170 - 141.6, 340 + 141.6 * 2, 340 + 141.6 * 2);
        ctx.save();
        ctx.translate(arcX, arcY);
        if (balls.length != 0) {
            balls.forEach(function (item, index) {
                ctx.save();
                ctx.rotate(Math.PI / 180 * item.angle);
                clycleF();
                timeF(rotateAngle);
                var data = new Date();
                if (time % 3 == 0) {
                    if (data.getMilliseconds() % angleNum == 0) {
                        isPause = true;
                    }
                    if (isPause) {
                        setTimeout(function () {
                            isPause = false;
                        }, 1000 / 33)
                    }
                    if (!isPause) {
                        item.angle += rotateAngle;
                    } else {
                        item.angle += 0;
                    }
                } else {
                    if (!flag) {
                        item.angle += rotateAngle;
                    }
                }
                if (item.angle >= 360) {
                    item.angle = 0;
                    quanshu++;
                }
                ballBig(item.angle);
                ctx.drawImage(item.img, -(item.z_width / 2), 170, item.z_width, item.z_height);
                ctx.restore();
            });
        } else {
            ballBig();
        }
        ctx.restore();
        if (!isOver) {
            window.requestAnimationFrame(ballRotate);
        }
    }
    canvas.ontouchmove = function (e) {
        e.preventDefault();
    };
    canvas.ontouchend = function (e) {
        if (!isClick) {
            var obj = waitBalls.shift();
            if (waitBalls.length >= 0) {
                for (var i = 0; i < balls.length; i++) {
                    if (Math.abs(balls[i].angle % 180) < 7 || Math.abs(balls[i].angle % 180) > 174) {
                        isOver = true;
                        Over();
                    }
                }
                if (waitBalls.length === 0) {
                    isClick = true;
                }
                obj.angle = 180;
                balls.push({
                    angle: obj.angle,
                    img: obj.img_z,
                    z_width: obj.z_width,
                    z_height: obj.z_height
                });
                if (waitBalls.length === 0 && isOver == false) {
                    isOver = true;
                    clearInterval(interval);
                    setTimeout(function () {
                        level++;
                        Play();
                    }, 300);
                }
            }
        }
    };
    function Over() {
        clearInterval(interval);
        setTimeout(function () {
            $("#resultPanel").show();
        },300);
    }
    function Play() {
        if (level > 3) {
            $(".out").hide();
            $(".success").show();
            $(".replay-e").hide();
            $(".replay-s").show();
            $("#resultPanel").show();
        } else {
            $(".num").attr("src", "images/time/" + level + ".png");
            $(".level").show();
            balls = [];
            waitBalls = [];
            time = 30;
            angle = 0;
            isOver = false;
            quanshu = 1;
            waitNum = LevelSpeed[level - 1].waitNum;//定义旋转小球的数量
            ballNum = LevelSpeed[level - 1].ballNum;//定义等待小球的数量
            rotateAngle = LevelSpeed[level - 1].speed;//定义旋转的角度
            angleNum = LevelSpeed[level - 1].angle;//定义角度个数
            levelCycles = [];
            levelTime = [];
            str_time = [];
            paintTime();
            setTimeout(function () {
                $(".level").hide();
                update(waitNum, ballNum);
                setTime();
                ballRotate();
                ballWait();
                isClick = false;
            }, 1000);
        }
    }
    function clycleF() {
        if (levelCycles.length > 0) {
            for (var i = 0; i < levelCycles.length; i++) {
                if (quanshu == levelCycles[i]) {
                    // console.log("圈数:" + levelCycles[i]);
                    rotateAngle = LevelSpeed[level - 1].speed + 2;
                    setTimeout(function () {
                        rotateAngle = LevelSpeed[level - 1].speed;
                    }, 300);
                }
            }
        }
    }
    function timeF(speed) {
        if (levelTime.length > 0) {
            for (var i = 0; i < levelTime.length; i++) {
                if (time == levelTime[i]) {
                    // console.log("时间:" + levelTime[i]);
                    rotateAngle = -speed;
                    flag = true;
                    if (str_time.indexOf(levelTime[i]) == -1) {
                        str_time.push(levelTime[i]);
                        levelTime.splice(0, 1);
                        flag = false;
                    }
                }
            }
        }
    }
    function init() {
        waitNum = LevelSpeed[level - 1].waitNum;
        ballNum = LevelSpeed[level - 1].ballNum;
        rotateAngle = LevelSpeed[level - 1].speed;
        angleNum = LevelSpeed[level - 1].angle;
        if (level == 1) {
            time = 15;
            $(".num").attr("src", "images/time/" + level + "_1.png");
        } else {
            time = 30;
            $(".num").attr("src", "images/time/" + level + ".png");
        }
        $(".level").show();
        setTimeout(function () {
            $(".level").hide();
            setTime();
        }, 800);
        update(waitNum, ballNum);
        ballRotate();
        ballWait();
    }
    function update(waitnum, ballnum) {
        for (var j = 0; j < waitnum; j++) {
            waitBalls.push({
                name: fei[j].name,
                img: im.createImage(fei[j].img),
                img_z: im.createImage(fei[j].img_z),
                width: fei[j].width,
                height: fei[j].height,
                z_width: fei[j].z_width,
                z_height: fei[j].z_height,
                top: fei[j].top,
                angle: 0
            });
        }
        if (ballnum != 0) {
            for (var i = 0; i < ballnum; i++) {
                var angle = 360 / ballnum * i;
                balls.push({
                    angle: angle,
                    img: im.createImage(fei[i].img_z),
                    z_width: fei[i].z_width,
                    z_height: fei[i].z_height,
                });
            }
        }
        if (level == 1) {
            var c0 = [1];
            var c1 = randNum(1, 3, 1);
            var c2 = randNum(3, 5, 1);
            levelCycles = c0.concat(c1).concat(c2);
        } else if (level == 2) {
            var t1 = randNum(20, 29, 6);
            var t2 = randNum(10, 19, 7);
            var t3 = randNum(1, 9, 5);
            levelTime = t1.concat(t2).concat(t3);
            levelTime.sort(arrBig);
        } else if (level == 3) {
            var c3 = randNum(0, 3, 1);
            var c4 = randNum(3, 7, 2);
            var c5 = randNum(7, 10, 1);
            var c6 = randNum(10, 12, 1);
            levelCycles = c3.concat(c4).concat(c5).concat(c6);
            levelCycles.sort(arrSmall);
            var t4 = randNum(20, 29, 6);
            var t5 = randNum(10, 19, 7);
            var t6 = randNum(1, 9, 5);
            levelTime = t4.concat(t5).concat(t6);
            levelTime.sort(arrBig);
        }
    }
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
    function randNum(min, max, num) {
        if (num > max - min) {
            console.error('范围太小');
            return false;
        }
        var range = max - min,
            minV = min + 1, //实际上可以取的最小值
            arr = [],
            tmp = "";

        function GenerateANum(i) {
            for (i; i < num; i++) {
                var rand = Math.random(); //  rand >=0  && rand < 1
                tmp = Math.floor(rand * range + minV);
                if (arr.indexOf(tmp) == -1) {
                    arr.push(tmp)
                } else {
                    GenerateANum(i);
                    break;
                }
            }
        }

        GenerateANum(0); //默认从0开始
        return arr;
    }
    function arrSmall(a, b) {
        return a - b
    }
    function arrBig(a, b) {
        return b - a;
    }
    init();
}