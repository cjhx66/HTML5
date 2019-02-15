//导入工具包 require('node_modules里对应模块')
var gulp = require('gulp'), //本地安装gulp所用到的地方
    concat=require('gulp-concat'),//合并文件
    minifyCss=require('gulp-minify-css'),//压缩css
    jshint=require('gulp-jshint'),
    uglify=require('gulp-uglify'),//压缩js
    rev=require('gulp-rev'),//对文件名加MD5后缀
    revCollector=require('gulp-rev-collector'),//路径替换
    clean=require('gulp-clean');//清空文件夹，避免资源冗余

//清空文件夹，避免资源冗余css
gulp.task('cleancss',function () {
    return gulp.src('css',{read:false})
        .pipe(clean());
});

//清空文件夹，避免资源冗余js
gulp.task('cleanjs',function () {
    return gulp.src('js',{read:false})
        .pipe(clean());
});

gulp.task('css',['cleancss'],function () {
    gulp.src(['css/main.css','css/style.css'])
        .pipe(minifyCss()) // 压缩处理成一行
        .pipe(rev())//文件名加MD5后缀
        .pipe(gulp.dest('src/css'))//- 输出文件本地
        .pipe(rev.manifest())//生成一个rev-manifest.json
        .pipe(gulp.dest('rev/css'))//- 将 rev-manifest.json 保存到 rev 目录内
});

gulp.task('js',['cleanjs'],function () {
    gulp.src(['js/*.js'])
        .pipe(jshint()) // 压缩处理成一行
        .pipe(uglify()) // 压缩js
        .pipe(rev())//文件名加MD5后缀
        .pipe(gulp.dest('src/js'))//- 输出文件本地
        .pipe(rev.manifest())//生成一个rev-manifest.json
        .pipe(gulp.dest('rev/js'))//- 将 rev-manifest.json 保存到 rev 目录内
});

gulp.task('rev',function () {
    gulp.src(['rev/**/*.json','index.html'])//- 读取 rev-manifest.json 文件以及需要进行css名替换的文件。通过hash来精确定位到html模板中需要更改的部分，然后将修改成功的文件生成到指定目录
        .pipe(revCollector())
        .pipe(gulp.dest('./'));
});
gulp.task('default',['css','js','rev']);

