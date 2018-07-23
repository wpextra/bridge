'use strict'
var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var cssmin = require('gulp-cssmin')
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var runSequence = require('run-sequence');
var multiDest = require('gulp-multi-dest');
var concat = require('gulp-concat-sourcemap');
var sourcemaps = require('gulp-sourcemaps');



gulp.config = require('./config.json');
var config = gulp.config;



gulp.task('app', ['js-dev', 'sass-dev'], function() {
  gulp.watch(config.source + 'scss/**/**/*.scss', ['sass-dev']);
  gulp.watch(config.source + 'js/**/*.js', ['js-dev']);
});




gulp.task('sass-dev', [], function() {
  return gulp.src(config.app.css)
  .pipe(sass())
  .pipe(gulp.dest(config.target + 'css'))
  .pipe(cssmin())
  .pipe(rename({suffix: '.min'}))
  .pipe(gulp.dest(config.target + 'css'));
});


gulp.task('js-dev', [], function() {
  return gulp.src(config.app.js)
  .pipe(gulp.dest(config.target + 'js'))
  .pipe(rename({suffix: '.min'}))
  .pipe(gulp.dest(config.target + 'js'));
});



gulp.task('default', ['app']); 

gulp.task('vendor', [], function() {

  gulp.src(config.js)
  .pipe(concat('vendor.js'))
  .pipe(gulp.dest(config.target + 'js/'))
  .pipe(rename({suffix: '.min'}))
  .pipe(gulp.dest(config.target + 'js'));
  
  gulp.src(config.css)
  .pipe(concat('vendor.css'))
  .pipe(gulp.dest(config.target + 'css/'));

  gulp.src(config.source + 'img/**/*')
 .pipe(gulp.dest(config.target + 'img'));

 gulp.src(config.fonts)
 .pipe(gulp.dest(config.target + 'fonts/'));

});
