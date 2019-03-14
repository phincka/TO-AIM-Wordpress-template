const gulp = require('gulp');
const cssnano = require('gulp-cssnano');
const concat = require("gulp-concat");
const uglify = require("gulp-uglify");
const autoprefixer = require('gulp-autoprefixer');
const imagemin = require('gulp-imagemin');
const imageminMozjpeg = require('imagemin-mozjpeg');
const sass = require("gulp-sass");
const gutil = require("gulp-util");
const del = require("del");
const babel = require('gulp-babel');
const include = require("gulp-include");
const run = require('gulp-run');
const directoryExists = require('directory-exists');

var dir = {
	// gets minified, compiled - merged to /dist/js/app.css
	css: 'src/css/*',
	csslib: 'src/css/lib/*',
	// gets minified, compiled, prefixed - merged to /dist/css/app.css
	js: 'src/js/*',

	// gets minified, compiled - merged to /dist/js/lib.lib
	jslib: 'src/js/lib/_libraries.js',


	php: '*.php',
	// images are first optimized
	img: 'src/img/**',

	// production dirs
	build: 'dist/',
	buildCss: 'dist/css/',
	buildJs: 'dist/js/',
	buildImg: 'dist/img/'
};

var messages = {
	error: '>>> ERROR LINE: ',
	uglify: '>>> ERROR ON MINIFICATION'
};

// merge, compile, minify css files
gulp.task('css', function () {
	return gulp.src(dir.css)
		.pipe(concat('app.css'))
		.pipe(sass({
			sourceMap: true
		}))
		.on('error', function (err) {
			console.error(messages.error + err.line + ' ' + err.relativePath);
			console.log(err.formatted);
			this.emit('end');
		})
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(cssnano())
		.pipe(gulp.dest(dir.buildCss));
});


// merge, compile, minify js files
gulp.task('js', function () {
	return gulp.src(dir.js)
		.pipe(concat('app.js'))
		.pipe(babel({
			presets: ['env']
		}))
		.on('error', function (e) {
			console.log(messages.error + e.loc.line);
			console.log(e.message + ' ' + e.name);
			this.emit('end');
		})
		.pipe(uglify().on('error', function (uglify) {
			console.error(messages.uglify);
			console.log(uglify);
			this.emit('end');
		}))
		.pipe(gulp.dest(dir.buildJs));
});


// merge all js lib files
gulp.task('jslib', function () {
	return gulp.src(dir.jslib)
		.pipe(include())
		.pipe(concat('lib.js'))
		.pipe(uglify().on('error', function (uglify) {
			console.error(messages.uglify);
			this.emit('end');
		}))
		.pipe(gulp.dest(dir.buildJs));
});

// merge, compile, minify js files
gulp.task('images', function () {
	gulp.src(dir.img)
		.pipe(imagemin([
			imageminMozjpeg({
				quality: 70
			}),
			imagemin.optipng({
				optimizationLevel: 5
			}),
			imagemin.svgo()
		]))
		.pipe(gulp.dest(dir.buildImg));
});

// clear dist dir
gulp.task("clean", function () {
	return del([dir.build]);
});



gulp.task('default', function () {
	gulp.start('check');

	gulp.watch([dir.css, dir.csslib], ['css']);
	gulp.watch(dir.js, ['js']);
	gulp.watch(dir.jslib, ['jslib']);
	gulp.watch(dir.img, ['images']);
});

gulp.task('check', function () {
	directoryExists('dist', (error, result) => {
		if (result == false) {
			console.log('No dist dir found, building project');
			gulp.start('build');
		}
	});
});

gulp.task('build', function () {
	gulp.start('jslib');
	gulp.start('js');
	gulp.start('css');
});
