const fs = require('fs');
const handlebars = require('handlebars');
const htmlparser = require('htmlparser2');
const through = require('through2');
const del = require('del');
const gulp = require('gulp');
const $ = require('gulp-load-plugins')();

const BUILD_DIR = './build';

var template = handlebars.compile(fs.readFileSync('./src/template.html', {encoding: 'utf8'}));

function extractTitleFromHTML(file) {
    return new Promise(function(resolve, reject) {
        var inH1 = false;
        var extracted = false;
        var parser = new htmlparser.Parser({            
            onopentag(name, attrs) {
                inH1 = ('h1' == name.toLowerCase());
            },
            ontext(text) {
                if (inH1) {
                    extracted = true;
                    resolve(text);
                }
            },
            onend() {
                if (!extracted) {
                    reject(new Error('Unable to find an <h1> element in the source file ' + file.path));
                }
            }
        }, {decodeEntities: true});

        parser.write(file.contents);
        parser.end();
    });
}

function extractTitle(file) {
    return extractTitleFromHTML(file);
}

function mergeHTML(file, enc, cb) {
    extractTitle(file).then(title => {
        var merged = template({
            title: title,
            content: fs.readFileSync(file.path, {encoding: 'utf8'})
        });
        file.contents = new Buffer(merged);
        cb(null, file);
    })
    .catch(err => {
        cb(err);
    });
}

function merge(file, enc, cb) {
    mergeHTML(file, enc, cb);
}

gulp.task('merge', function() {
    return gulp.src('./src/*/*.html')
        .pipe(through.obj(merge))
        .pipe(gulp.dest(BUILD_DIR));
});

gulp.task('images', function() {
    return gulp.src('./src/*/img/**')
        .pipe($.cache($.imagemin()))
        .pipe(gulp.dest(BUILD_DIR));
});

gulp.task('global-css', function() {
    return gulp.src('./src/css/**')
        .pipe(gulp.dest(BUILD_DIR + '/css'));
});

gulp.task('global-img', function() {
    return gulp.src('./src/img/**')
        .pipe($.cache($.imagemin()))
        .pipe(gulp.dest(BUILD_DIR + '/img'));
});

gulp.task('global-lib', () => {
    return gulp.src('./src/lib/**')
        .pipe(gulp.dest(BUILD_DIR + '/lib'));
});

gulp.task('clean', () => {
    return del('./build');
});

gulp.task('default', ['merge', 'images', 'global-css', 'global-img', 'global-lib']);
