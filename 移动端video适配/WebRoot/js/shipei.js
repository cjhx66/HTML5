/**
 * Created by yuh on 2017/12/19.
 */
/**
 *
 * 识别移动设备
 * 检测相应的设备。
 * */

var canvas=document.getElementById('c1');
console.log(canvas);
var ua=navigator.userAgent;
var system={
    win:false,
    mac:false,
    x11:false,
    //mobile
    iphone:false,
    ipad:false,
    ios:false,
    android:false,
    winMobile:false
};

//
var p=navigator.platform;
system.win=p.indexOf('Win')==0;
system.mac=p.indexOf('Mac')==0;
system.x11=(p=='x11')||(p.indexOf('Linux')==0);

system.iphone=ua.indexOf('iPhone')>-1;
system.ipad=ua.indexOf('iPad')>-1;
system.android=ua.indexOf('Android')>-1;

function getViewPort(){
    var viewHeight=window.innerHeight||document.documentElement.clientHeight;
    var viewWidth=window.innerWidth||document.documentElement.clientWidth;
    console.log(viewHeight,viewWidth);
    if(system.iphone){
        document.body.style.width=viewWidth;
        canvas.width=viewWidth;
        canvas.height=viewHeight;
    }
    else if(system.win){
        canvas.width=600;
        canvas.height=900;
    }
}

getViewPort();
