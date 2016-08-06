const fs = require('fs');
const handlebars = require('handlebars');
const htmlparser = require('htmlparser2');
const through = require('through2');
const del = require('del');
const gulp = require('gulp');
const $ = require('gulp-load-plugins')();

const DIST_DIR = './dist';

var template = handlebars.compile(fs.readFileSync('./src/template.html', {encoding: 'utf8'}));

function extractTitleFromHTML(file) {
    return new Promise(function(resolve, reject) {
        var inH1 = false;
        var title = "";
        var parser = new htmlparser.Parser({            
            onopentag(name, attrs) {
                inH1 = ('h1' == name.toLowerCase());
            },
            ontext(text) {
                if (inH1) {
                    title += text;
                }
            },
            onclosetag(name) {
                if ('h1' == name.toLowerCase()) {
                    resolve(title);
                }
            },
            onend() {
                if (title.length == 0) {
                    reject(new Error('Unable to find an <h1> with content in the source file ' + file.path));
                }
            }
        }, {decodeEntities: true});

        parser.write(file.contents);
        parser.end();
    });
}

function mergeHTML(file, enc, cb) {
    extractTitleFromHTML(file).then(title => {
        var merged = template({
            title: title,
            content: file.contents.toString('utf8')
        });
        file.contents = Buffer.from(merged, 'utf8');
        cb(null, file);
    })
    .catch(err => {
        cb(err);
    });
}

gulp.task('merge-md', () => {
    return gulp.src('./src/*/*.md')
        .pipe(through.obj(convertMarkdown))
        .pipe(gulp.dest(DIST_DIR))
});

gulp.task('merge-html', () => {
    return gulp.src('./src/*/*.html')
        .pipe(through.obj(mergeHTML))
        .pipe(gulp.dest(DIST_DIR));
});

gulp.task('images', () => {
    return gulp.src('./src/*/img/**')
        .pipe($.cache($.imagemin()))
        .pipe(gulp.dest(DIST_DIR));
});

gulp.task('global-css', () => {
    return gulp.src('./src/css/**')
        .pipe(gulp.dest(DIST_DIR + '/css'));
});

gulp.task('global-img', () => {
    return gulp.src('./src/img/**')
        .pipe($.cache($.imagemin()))
        .pipe(gulp.dest(DIST_DIR + '/img'));
});

gulp.task('global-lib', () => {
    return gulp.src('./src/lib/**')
        .pipe(gulp.dest(DIST_DIR + '/lib'));
});

gulp.task('clean', () => {
    return del(DIST_DIR);
});

gulp.task('default', ['merge-html', 'images', 'global-css', 'global-img', 'global-lib']);
