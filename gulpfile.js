var elixir = require('laravel-elixir');
var autoprefixer = require('gulp-autoprefixer');
var shell = require("gulp-shell");

elixir.config.css.autoprefix = {
    enabled: false,
    options: {
        browsers: ['last 5 versions', '> 1%'],
        cascade: true,
        remove: false
    }
};

var addSassTask = function (src, output, options, useRuby) {
    return compile({
        compiler: 'Sass',
        plugin: useRuby ? 'gulp-ruby-sass' : 'sass',
        pluginOptions: buildOptions(options, useRuby),
        src: src,
        output: output || elixir.config.cssOutput,
        search: '**/*.+(sass|scss)'
    });
};

elixir.extend("publish", function () {
    gulp.task("publish_assets", function () {
        gulp.src("").pipe(shell([
            "php.exe F:\\PhpstormProjects\\provision-cms-5.4\\artisan vendor:publish --tag=public --tag=views --force"
        ]));
    });
});

elixir(function (mix) {
    mix.combine([
        'Resources/Assets/bower_components/jquery-htmlclean/jquery.htmlClean.js',
        'Resources/Assets/js/visual_builder.js',
    ], 'Public/assets/js/visual_builder.js');


    mix.sass([
        'visual_builder.scss'
    ], 'Public/assets/css/visual_builder.css', 'Resources/Assets/sass/');

    mix.combine([
        'Resources/Assets/bower_components/grid-editor/dist/jquery.grideditor.min.js',
    ], 'Public/assets/js/visual_builder2.js');

    mix.combine([
        'Resources/Assets/bower_components/grid-editor/dist/grideditor.css',
    ], 'Public/assets/css/visual_builder2.css');

    mix.publish();
});


gulp.task("full", ["all", "publish_assets"], function () {

});