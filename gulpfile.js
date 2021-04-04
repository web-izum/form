"use strict";

const {watch, src, dest, series, parallel} = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const buble = require('gulp-buble');

sass.compiler = require('node-sass');

 function style() {
    return src('./src/scss/**/app.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            cascade: false
        }))
        .pipe(dest('./build/css'));
};

function script() {
    return src( './src/js/**/*.js' )
        .pipe(buble())
        .pipe(dest('./build/js'))
}

function php() {
    return src( './src/**/*.php' )
        .pipe(dest('./build/'))
};

function watcher() {
    watch('./src/scss/**/*.scss', style);
    watch('./src/js/**/*.js', script);
    watch('./src/**/*.php', php);
};

exports.style = style;
exports.script = script;
exports.php = php;
exports.watcher = watcher;
exports.build = series(parallel(style, script, php), watcher);