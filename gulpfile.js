var gulp = require('gulp'),
    stylus = require('gulp-stylus'),
    cleanCSS = require('gulp-clean-css'),
    uglify = require('gulp-uglify'),
    pump = require('pump'),
    gulpMinifyCssNames = require('gulp-minify-cssnames'),
    phpMinify = require('gulp-php-minify'),
    htmlmin = require('gulp-htmlmin');

// Copy favicon
gulp.task('copy-img', function() {
   gulp.src('./img/favicon.ico')
   .pipe(gulp.dest('build'));
});

// Stylus
gulp.task('stylus', function () {
  gulp.src('./css/styl/style.styl')
    .pipe(stylus({
      compress: false
    }))
    .pipe(gulp.dest('./css'));
});

// Watch
gulp.task('watch', function() {
  gulp.watch(['./css/styl/*.styl'], ['stylus'])
});

// Minify css names
gulp.task('minify-css-names', function() {
    return gulp.src(['css/style.css', 'index.php', 'js/app.js'])
        .pipe(gulpMinifyCssNames())
        .pipe(gulp.dest('temp'))
});

// Minify php code
gulp.task('minify-php', () => gulp.src('temp/minified-php/index.php', {read: false})
  .pipe(phpMinify())
  .pipe(gulp.dest('build'))
);

// Minify html in php file 
gulp.task('minify-html', function() {
  return gulp.src('build/index.php')
    .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest('temp/minified-php'))
});

// Minify js 
gulp.task('jsmin', function (cb) {
  pump([
        gulp.src('temp/app.js'),
        uglify(),
        gulp.dest('build')
    ],
    cb
  );
});

// Minify css
gulp.task('cssmin', function() {
  return gulp.src('temp/style.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('build'));
});

gulp.task('default', ['stylus', 'watch', 'minify-css-names', 'minify-php', 'jsmin', 'cssmin', 'minify-html', 'copy-img']);