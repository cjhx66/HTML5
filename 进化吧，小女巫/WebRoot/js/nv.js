/**
 * Created by yuh on 2018/10/26.
 */
var penImage1 = new Image();
penImage1.src = "images/nvwu1.png";
var nv = function () {
    this.x = gameMonitor.w / 2 - this.width / 2;
};
var nvWidth = 187;
var nvHeight = 293;
var nvTop = gameMonitor.h - 2 * this.height;
nv.prototype.draw = function () {
    ctx.drawImage(penImage1, this.x,nvTop, nvWidth, nvHeight);
};
window.nv = nv;