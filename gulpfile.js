//**npm init - through the motions

//** Install the gulp package in your devDependencies
//https://gulpjs.com/docs/en/getting-started/quick-start/
//npm install --save-dev gulp

//** Gulp SASS */
//https://www.npmjs.com/package//gulp-sass
//npm install sass gulp-sass gulp-sourcemaps --save-dev

//**Gulp Babel
//https://www.npmjs.com/package/gulp-babel
//npm install --save-dev gulp-babel @babel/core @babel/preset-env gulp-minify

//** AutoPrefixer */
//npm install --save-dev gulp-autoprefixer

//**Clean Up (Minify) CSS
//npm i --save-dev gulp-clean-css

//**critical STyles */
//npm i --save-dev gulp-rename gulp-concat-util

// *************
// => BABEL FOR JS
// *************
const gulp = require("gulp")
const babel = require("gulp-babel")
const minify = require("gulp-minify")

gulp.task("babel", () => {
  return gulp
    .src("wp-content/themes/Lubov/dev/js/scripts.js")
    .pipe(
      babel({
        presets: ["@babel/env"],
      })
    )
    .pipe(minify())
    .pipe(gulp.dest("wp-content/themes/Lubov/js"))
})

// *************
// => SASS FOR SCSS
// *************
const sass = require("gulp-sass")(require("sass"))
const autoprefixer = require("gulp-autoprefixer")
const cleanCSS = require("gulp-clean-css")
const sourcemaps = require("gulp-sourcemaps")

gulp.task("sass", () => {
  return (
    gulp
      .src([
        "wp-content/themes/Lubov/dev/sass/style.scss",
        // "wp-content/themes/Lubov/dev/sass/critical.scss",
      ])
      .pipe(sass().on("error", sass.logError))
      .pipe(
        autoprefixer({
          cascade: false,
        })
      )
      // .pipe(cleanCSS({ compatibility: "ie8" }))
      // .pipe(sourcemaps.init())
      // .pipe(sourcemaps.write("/maps"))
      .pipe(gulp.dest("wp-content/themes/Lubov"))
  )
})
gulp.task("sass-minify", () => {
  return (
    gulp
      .src(["wp-content/themes/Lubov/dev/sass/critical.scss"])
      .pipe(sass().on("error", sass.logError))
      .pipe(
        autoprefixer({
          cascade: false,
        })
      )
      .pipe(cleanCSS({ compatibility: "ie8" }))
      // .pipe(sourcemaps.init())
      // .pipe(sourcemaps.write("/maps"))
      .pipe(gulp.dest("wp-content/themes/Lubov"))
  )
})

var rename = require("gulp-rename")
var concat = require("gulp-concat-util")

gulp.task("styles:critical", function () {
  return (
    gulp
      .src("wp-content/themes/Lubov/critical.css")
      // wrap with style tags
      .pipe(concat.header("<style>"))
      .pipe(concat.footer("</style>"))
      // convert it to a php file
      .pipe(
        rename({
          basename: "criticalCSS",
          extname: ".php",
        })
      )
      // insert it Wordpress theme folder
      .pipe(gulp.dest("wp-content/themes/Lubov"))
  )
})

// Then execute task with bracket '()' instead of '[]'
gulp.task("watch", function () {
  gulp.watch(
    [
      "wp-content/themes/Lubov/dev/sass/*.scss",
      "wp-content/themes/Lubov/dev/sass/partials/*.scss",
      "wp-content/themes/Lubov/dev/sass/modules/*.scss",
      "wp-content/themes/Lubov/dev/sass/components/*.scss",
      "wp-content/themes/Lubov/dev/sass/content-rows/*.scss",
    ],
    gulp.parallel(["sass", "sass-minify"])
  )
  gulp.watch(
    "wp-content/themes/Lubov/critical.css",
    gulp.parallel("styles:critical")
  )
  gulp.watch("wp-content/themes/Lubov/dev/js/*.js", gulp.parallel("babel"))
})
