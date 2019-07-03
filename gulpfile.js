var gulp = require('gulp');
var compass = require('gulp-compass');
var plumber = require('gulp-plumber');
var uglify = require("gulp-uglify");
var csso = require('gulp-csso');
var browser = require("browser-sync");
var imagemin = require("gulp-imagemin");
var concat = require('gulp-concat');

var paths = {
  commonDir : 'img/',
  miniDir : 'img_min/'
}

//画像最適化のタスク
gulp.task( 'imagemin', function(){
  var srcGlob = paths.commonDir + '/**/*.+(jpg|jpeg|png|gif|svg)';
  var dstGlob = paths.miniDir;
  var imageminOptions = {
    optimizationLevel: 7
  };
 
  gulp.src( srcGlob )
    .pipe(imagemin( imageminOptions ))
    .pipe(gulp.dest( dstGlob ));
});

//オートリロードのタスク
gulp.task("server", function() {
    browser({
    	notify: false,
      server: {
        baseDir: "./"
      }
    });
});

//Compassのタスク
gulp.task('compass',function(){
  gulp.src(['common/sass/*.scss'])
    .pipe(plumber())
    .pipe(compass({ //コンパイルする処理
        config_file : 'config.rb',
        comments : false,
        css : 'common/css',
        sass: 'common/sass/'
    }));
});

//Javascriptのタスク
gulp.task("js", function() {
  gulp.src(["common/js/*.js"])
    .pipe(plumber())
    .pipe(uglify())
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest("common/js/min"))
    .pipe(browser.reload({stream:true}))
});

//CSSのタスク
gulp.task('css', function() {
  return gulp.src('common/css/style.css')
    .pipe(csso())
    .pipe(gulp.dest('common/css/'))
    .pipe(browser.reload({stream:true}))
});


//HTMLのタスク
gulp.task('html', function() {
  return gulp.src(["**/*.html"])
    .pipe(browser.reload({stream:true}))
});


gulp.task("default",['server'], function() {
    gulp.watch(["common/js/*.js"],["js"]);
    gulp.watch("common/sass/*.scss",["compass"]);
    gulp.watch("common/css/*.css",["css"]);
    gulp.watch("**/*.html",["html"]);
});

