var src = "img/h5-1.mp3";
var loader = new createjs.LoadQueue(false);
loader.installPlugin(createjs.Sound);
loader.addEventListener("fileload", function ()
{
    createjs.Sound.registerSound(src, "sound");//单文件加载完成
});
loader.addEventListener("fileprogress", function (event)
{
    console.log("loaded",event.loaded,"progress",event.progress);//加载进度
});
loader.loadManifest([{"src":src,"id":"sound"}]);