// Dependencies
var gulp         = require( 'gulp' ),
    gulp_concat  = require( 'gulp-concat' ),
    gulp_uglify  = require( 'gulp-uglify' ),
    gulp_plumber = require( 'gulp-plumber' ),
    gulp_stylus  = require( 'gulp-stylus' );

// CSS task
gulp.task( 'css', function()
{
  gulp.src( './assets/stylus/main.styl' ) // main.styl as input
    .pipe( gulp_plumber() ) 
    .pipe( gulp_stylus() )             // Convert to CSS
    .pipe( gulp.dest( './assets/css' ) ); // Put it in CSS folder
} );

// JS task
gulp.task( 'js', function()
{
  return gulp.src( [                          // Get JS files (in order)
        './assets/js/script.js'
    ] )
    .pipe( gulp_concat( 'script.min.js' ) ) // Concat in one file
    .pipe( gulp_uglify() )                  // Minify them
    .pipe( gulp.dest( './assets/js/' ) );      // Put it in folder
} );

// Watch task
gulp.task( 'watch', function()
{
  // Watch for CSS modifications
  gulp.watch( './assets/stylus/**', [ 'css' ] );

  // Watch for JS modifications (but not for script.min.js)
  gulp.watch( [ './assets/js/**',
                '!./assets/js/script.min.js' ],
                [ 'js' ] );
} );


gulp.task( 'default', [ 'css', 'js', 'watch' ] );