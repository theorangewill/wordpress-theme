var gulp = require('gulp');
var sass = require('gulp-sass');
var watch = require('gulp-watch');

gulp.task('sass', gulp.series(function() {
    return gulp.src('sass/**/*.sass')
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest('css'));
}));


gulp.task('watch', gulp.series(function(){
	gulp.watch('sass/**/*.sass', gulp.series('sass'));
}));

gulp.task('default', gulp.series(['watch', 'sass']));
