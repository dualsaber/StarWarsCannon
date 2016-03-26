var gulp = require('gulp'),
    plumber = require('gulp-plumber'),
    rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var babel = require('gulp-babel');
var coffee = require('gulp-coffee');
var concat = require('gulp-concat');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin'),
    cache = require('gulp-cache');
var minifycss = require('gulp-minify-css');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');

gulp.task('browser-sync', function() {
  browserSync({
       proxy: "http://localhost/SWparser/app/"
  });
});

gulp.task('bs-reload', function () {
  browserSync.reload();
});

gulp.task('images', function(){
  gulp.src('dev/img/**/*')
    .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
    .pipe(gulp.dest('app/img/'));
});

gulp.task('copy', function(){
  gulp.src('dev/*')
    .pipe(gulp.dest('app/'));
});

gulp.task('styles', function(){
  gulp.src(['dev/css/**/*.scss'])
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(sass())
    .pipe(gulp.dest('app/css/'))
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('app/css/'))
    .pipe(browserSync.reload({stream:true}))
});

gulp.task('styles-local', function(){
  gulp.src(['dev/css/**/*.scss'])
    .pipe(sass())
    .pipe(gulp.dest('app/css/'))
    .pipe(browserSync.reload({stream:true}))
});

// gulp.task('scripts', function(){
//   return gulp.src('dev/js/**/*.coffee')
//     .pipe(plumber({
//       errorHandler: function (error) {
//         console.log(error.message);
//         this.emit('end');
//     }}))
//     .pipe(coffee({bare: true})
//     .pipe(jshint())
//     .pipe(jshint.reporter('default'))
//     .pipe(concat('main.js'))
//     .pipe(babel())
//     .pipe(gulp.dest('app/js/'))
//     .pipe(rename({suffix: '.min'}))
//     .pipe(uglify())
//     .pipe(gulp.dest('app/js/'))
//     .pipe(browserSync.reload({stream:true}))
// });

gulp.task('scripts-local', function(){
  return gulp.src('dev/js/**/*.coffee')
    .pipe(coffee({bare: true}))
    .pipe(concat('main.js'))
    //.pipe(babel())
    .pipe(gulp.dest('app/js/'))
    .pipe(browserSync.reload({stream:true}))
});

gulp.task('default', ['browser-sync'], function(){
  gulp.watch("dev/css/**/*.scss", ['styles']);
  gulp.watch("dev/js/**/*.coffee", ['scripts']);
  gulp.watch("*.php", ['bs-reload']);
});

gulp.task('local', ['browser-sync'], function(){
  gulp.watch("dev/css/**/*.scss", ['styles-local']);
  gulp.watch("dev/js/**/*.coffee", ['scripts-local']);
  gulp.watch("dev/*.php", ['bs-reload', 'copy']);
});
