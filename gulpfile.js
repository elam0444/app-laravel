var gulp = require('gulp');
var fs = require('fs');
var rename = require('gulp-rename');
var elixir = require('laravel-elixir');
var util = require('gulp-util');

var filesVersion = [
    'css/app.css'
];

var vendorDirectories = {
    'public/js/vendor/': 'public/js/vendor/',
    'public/css/vendor/': 'public/css/vendor/'
};

var directories = {
    './resources/assets/js/': 'public/js/'
};

var directoriesCopy = {
    './resources/assets/images/': 'public/images/',
    './resources/assets/fonts/': 'public/fonts/'
};

//TODO: Find a way to fix the routes from where the sourcemaps are loaded.
elixir.config.sourcemaps = false;

elixir(function (mix) {
    // Deploy jquery main files
    mix.scripts('./resources/assets/bower/jquery/dist/jquery.js', 'public/js/vendor/jquery.js', './');
    mix.scripts('./resources/assets/bower/jquery-ui/jquery-ui.js', 'public/js/vendor/jquery-ui.js', './');

    // Deploy Bootstrap main files
    mix.scripts('./resources/assets/bower/bootstrap/dist/js/bootstrap.js', 'public/js/vendor/bootstrap.js', './');
    mix.styles('./resources/assets/bower/bootstrap/dist/css/bootstrap.css', 'public/css/vendor/bootstrap.css', './');
    mix.copy('./resources/assets/bower/bootstrap/dist/fonts/', 'public/css/fonts');

    // Deploy DateTimePicker main files
    mix.scripts(
        [
            'resources/assets/bower/moment/moment.js',
            'resources/assets/bower/moment-timezone/builds/moment-timezone-with-data.js',
            'resources/assets/bower/moment-timezone/moment-timezone-utils.js',
            'resources/assets/bower/moment-duration-format/lib/moment-duration-format.js',
            'resources/assets/bower/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'
        ],
        'public/js/vendor/datetimepicker.js',
        './'
    );
    mix.styles('./resources/assets/bower/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css', 'public/css/vendor/datetimepicker.css', './');

    mix.scripts('./resources/assets/bower/d3/d3.js', 'public/js/vendor/d3.js', './');

    // Deploy font-awesome files
    mix.styles('./resources/assets/bower/components-font-awesome/css/font-awesome.css', 'public/css/vendor/font-awesome.css', './');
    mix.copy('./resources/assets/bower/components-font-awesome/fonts/', 'public/css/fonts/');

    // Deploy simple-line-icons files
    mix.styles('./resources/assets/bower/simple-line-icons/css/simple-line-icons.css', 'public/css/vendor/simple-line-icons.css', './');
    mix.copy('./resources/assets/bower/simple-line-icons/fonts/', 'public/css/fonts/');

    // Deploy bootstrap-maxlength files
    mix.scripts('./resources/assets/bower/bootstrap-maxlength/src/bootstrap-maxlength.js', 'public/js/vendor/bootstrap-maxlength.js', './');

    // Deploy bootstrap-multiselect files
    mix.scripts('./resources/assets/bower/bootstrap-multiselect/dist/js/bootstrap-multiselect.js', 'public/js/vendor/bootstrap-multiselect.js', './');
    mix.styles('./resources/assets/bower/bootstrap-multiselect/dist/css/bootstrap-multiselect.css', 'public/css/vendor/bootstrap-multiselect.css', './');

    // Deploy magnific-popup files
    mix.scripts('./resources/assets/bower/magnific-popup/dist/jquery.magnific-popup.js', 'public/js/vendor/magnific-popup.js', './');
    mix.styles('./resources/assets/bower/magnific-popup/dist/magnific-popup.css', 'public/css/vendor/magnific-popup.css', './');

    // Deploy DataTables files
    mix.scripts('./resources/assets/bower/datatables.net/js/jquery.dataTables.js', 'public/js/vendor/jquery.dataTables.js', './');
    mix.styles('./resources/assets/bower/datatables.net-dt/css/jquery.dataTables.css', 'public/css/vendor/jquery.dataTables.css', './');
    mix.scripts('./resources/assets/bower/datatables.net-rowreorder/js/dataTables.rowReorder.js', 'public/js/vendor/dataTables.rowReorder.js', './');
    mix.styles('./resources/assets/bower/datatables.net-rowreorder-dt/css/rowReorder.dataTables.css', 'public/css/vendor/rowReorder.dataTables.css', './');
    mix.copy('./resources/assets/bower/datatables.net-dt/images/', 'public/css/images/');

    // Deploy jquery-file-upload files
    mix.scripts('./resources/assets/bower/jquery-file-upload/js/jquery.fileupload.js', 'public/js/vendor/fileupload.js', './');
    mix.styles('./resources/assets/bower/jquery-file-upload/css/jquery.fileupload.css', 'public/css/vendor/fileupload.css', './');

    // Deploy TinyMCE files
    mix.scripts('./resources/assets/bower/tinymce-dist/tinymce.min.js', 'public/js/vendor/tinymce.min.js', './');
    mix.scripts('./resources/assets/bower/tinymce-dist/themes/modern/theme.min.js', 'public/js/vendor/themes/modern/theme.min.js', './');
    mix.styles('./resources/assets/bower/tinymce-dist/skins/lightgray/content.min.css', 'public/js/vendor/skins/lightgray/content.min.css', './');
    mix.styles('./resources/assets/bower/tinymce-dist/skins/lightgray/skin.min.css', 'public/js/vendor/skins/lightgray/skin.min.css', './');
    mix.copy('./resources/assets/bower/tinymce-dist/skins/lightgray/fonts/tinymce.woff', 'public/js/vendor/skins/lightgray/fonts/', './');
    mix.copy('./resources/assets/bower/tinymce-dist/skins/lightgray/fonts/tinymce.ttf', 'public/js/vendor/skins/lightgray/fonts/', './');
    mix.copy('./resources/assets/bower/tinymce-dist/plugins/', 'public/js/vendor/plugins/', './');

    // Deploy TinyMCE plugins files
    mix.scripts('./resources/assets/bower/tinymce-dist/plugins/fullpage/plugin.min.js', 'public/js/vendor/plugins/fullpage/plugin.min.js', './');
    mix.scripts('./resources/assets/bower/tinymce-dist/plugins/code/plugin.min.js', 'public/js/vendor/plugins/code/plugin.min.js', './');
    mix.scripts('./resources/assets/bower/tinymce-dist/plugins/link/plugin.min.js', 'public/js/vendor/plugins/link/plugin.min.js', './');
    mix.scripts('./resources/assets/bower/tinymce-dist/plugins/image/plugin.min.js', 'public/js/vendor/plugins/image/plugin.min.js', './');
    mix.scripts('./resources/assets/bower/tinymce-dist/plugins/preview/plugin.min.js', 'public/js/vendor/plugins/preview/plugin.min.js', './');
    mix.scripts('./resources/assets/bower/tinymce-dist/plugins/paste/plugin.min.js', 'public/js/vendor/plugins/paste/plugin.min.js', './');

    // Deploy jquery-textcomplete files
    mix.scripts('./resources/assets/bower/jquery-textcomplete/dist/jquery.textcomplete.min.js', 'public/js/vendor/jquery.textcomplete.min.js', './');
    mix.styles('./resources/assets/bower/jquery-textcomplete/dist/jquery.textcomplete.css', 'public/css/vendor/jquery.textcomplete.css', './');

    // Deploy App Test files
    mix.sass(['./resources/assets/css/*.scss'], 'public/css');

    /* Minified and Cache Busting */
    for (var prodDirectory in directories) {
        var files = fs.readdirSync(prodDirectory);

        var toDirectory = directories[prodDirectory];

        files.forEach(function (filename) {
            if (filename.endsWith('.js')) {
                mix.scripts(prodDirectory + filename, toDirectory + filename);
            }
        });
    }

    for (var copyDirectory in directoriesCopy) {
        mix.copy(copyDirectory, directoriesCopy[copyDirectory]);
    }

    for (var vendorDirectory in vendorDirectories) {
        var filesVendorDir = fs.readdirSync(vendorDirectory);

        filesVendorDir.forEach(function (filename) {
            if (filename.endsWith('.js')) {
                filesVersion.push('js/vendor/' + filename);
            } else if (filename.endsWith('.css')) {
                filesVersion.push('css/vendor/' + filename);
            }
        });
    }

    for (var versionDirectory in directories) {
        var filesDir = fs.readdirSync(versionDirectory);

        var to = directories[versionDirectory];
        var dirPostfix = to.replace('public/js/', '');

        filesDir.forEach(function (filename) {
            if (filename.endsWith('.js')) {
                filesVersion.push('js/' + dirPostfix + filename);
            }
        });
    }

    mix.version(filesVersion);
});

gulp.task('version-dev', function () {
    setTimeout(function () {
        return gulp.start('version');
    }, 1000);
});

gulp.task('watch', function () {
    gulp.watch('./resources/assets/js/*.js', ['scripts', 'version-dev']);
    gulp.watch('./resources/assets/js/*/*.js', ['scripts', 'version-dev']);

    gulp.watch('./resources/assets/css/*.scss', ['sass', 'version-dev']);
    gulp.watch('./resources/assets/css/*/*.scss', ['sass', 'version-dev']);
});
