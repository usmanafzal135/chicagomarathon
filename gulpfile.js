/*
    Welcome to the Gulp File!

    These tasks are at your command:

        gulp build:
            build all CSS + JS assets, and show linting errors

        gulp watch:
            perform a build every time a CSS or JS file changes

        gulp fix:
            automatically fix as many linting errors as possible
*/
const gulp = require('gulp');
const eslint = require('gulp-eslint-new');
const exec = require('child_process').exec;
const inject = require('gulp-inject-string');
const rename = require('gulp-rename');
const replace = require('gulp-replace');
const stylelint = require('@ronilaukkarinen/gulp-stylelint');
const sass = require('gulp-dart-sass');

// our style files
const styles = [
    './scss/**/*',
];

// our js files
const scripts = [
    './js/**/*',
];

// Lint SCSS
function styleLint() {

    return gulp.src(styles)
        .pipe(
            stylelint({
                reporters: [
                    {
                        formatter: 'string',
                        console: true,
                    },
                ],
            }),
        );

}

// Lint JS
function jsLint() {

    return gulp.src(scripts)
        .pipe(
            eslint({
                useEslintrc: true,
            }),
        )
        .pipe(eslint.format());

}


// Compile Tailwind CSS
function tailwindCssCompile(done) {

    exec('npx tailwindcss -i ./scss/tailwind.css -o ./dist/main.css --minify', function tailwindSCSS(err, stdout, stderr) {

        if (stdout) {

            console.log(stdout);

        }

        if (stderr) {

            console.log(stderr);

        }

    });

    done();

}

// Compile Editor CSS
function editorCssCompile(done) {

    exec('npx tailwindcss -i ./scss/editor.css -o ./dist/editor-temp.css', function tailwindSCSS(err, stdout, stderr) {

        if (stdout) {

            console.log(stdout);

        }

        if (stderr) {

            console.log(stderr);

        }

    return gulp.src('./dist/editor-temp.css')
        .pipe(rename('editor.scss'))
        .pipe(inject.wrap('.acf-block-preview {\n', '}.acf-block-preview{max-width:100%}.typography *{color:inherit}'))
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(gulp.dest('./dist/'));

    });

    done();

}

// Generate & Minify JS
function compile(done) {

    exec('rm -rf dist/build/* && npx rollup -c', function rollupJS(err, stdout, stderr) {

        if (stdout) {

            console.log(stdout);

        }

        if (stderr) {

            console.log(stderr);

        }

    });

    done();

}

// JS: lint and fix issues (cannot be run as part of a watch task)
function fixJSLint() {

    return gulp.src(
        'js/**/*.js',
        'js/**/*.vue',
    )
        .pipe(
            eslint({
                useEslintrc: true,
                fix: true,
            }),
        )
        .pipe(gulp.dest((file) => file.base))
        .pipe(eslint.format());

}

// CSS: lint and fix issues (cannot be run as part of a watch task)
function fixStyleLint() {

    return gulp.src(styles)
        .pipe(
            stylelint({
                fix: true,
                reporters: [
                    {
                        formatter: 'string',
                        console: true,
                    },
                ],
            }),
        )
        .pipe(gulp.dest((file) => file.base));

}

//critical = gulp.series(criticalSSTemplate);
//

// Compile Critcal CSS
function criticalCssCompile(done) {

    exec('npx tailwindcss -i ./scss/critical.css -o ./includes/partials/critical-temp.php --minify', function tailwindSCSS(err, stdout, stderr) {

        if (stdout) {

            console.log(stdout);

        }

        if (stderr) {

            console.log(stderr);

        }

    return gulp.src('./includes/partials/critical-temp.php', {"allowEmpty": false})
        .pipe(replace('../images', "<?php echo get_template_directory_uri() . '/images';?>"))
        .pipe(replace('../fonts', "<?php echo get_template_directory_uri() . '/fonts';?>"))
        .pipe(rename('critical.php'))
        .pipe(inject.wrap('<style>\n', '</style>'))
        .pipe(gulp.dest('./includes/partials/'));

    });

    done();

}

// Fix task
exports.fix = gulp.series(
    fixJSLint,
    fixStyleLint,
);

// Build task
exports.build = gulp.series(
    styleLint,
    jsLint,
    compile,
    tailwindCssCompile,
    editorCssCompile,
    criticalCssCompile,
    compile,
);

exports.compile = gulp.series(compile);

// Watch task
function watch() {

    /*
        if a style file changes, run stylelint and compile
    */
    gulp.watch(
        [
            'tailwind.config.js',
            'tailwind.critical.config.js',
            './scss/**/*',
            './**/*.php',
            './includes/**/*.{html,js,php}',
            '!./includes/**/critical.php',
            '!./includes/**/critical-temp.php',
        ],
        { ignoreInitial: true },
        gulp.series(
            styleLint,
            tailwindCssCompile,
            editorCssCompile,
            criticalCssCompile,
        ),
    );

    /*
        if a JS file changes, run jslint and compile
    */
    gulp.watch(
        [
            './js/**/*',
        ],
        { ignoreInitial: true },
        gulp.series(
            jsLint,
            compile,
        ),
    );

}

exports.watch = watch;
exports.default = watch;
