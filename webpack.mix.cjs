const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .copy('node_modules/admin-lte/dist/css/adminlte.min.css', 'public/css/adminlte.css')
    .copy('node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css', 'public/css/fontawesome.css')
    .copy('node_modules/admin-lte/plugins/dropzone/min/dropzone.min.css', 'public/css/dropzone.css')
    .copy('node_modules/admin-lte/plugins/select2/css/select2.min.css', 'public/css/select2.min.css')
    .copy('node_modules/admin-lte/plugins/jquery/jquery.min.js', 'public/js/jquery.js')
    .copy('node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js', 'public/js/bootstrap.bundle.js')
    .copy('node_modules/admin-lte/dist/js/adminlte.min.js', 'public/js/adminlte.js')
    .copy('node_modules/admin-lte/plugins/bootstrap-switch/js/bootstrap-switch.min.js', 'public/js/bootstrap-switch.js')
    .copy('node_modules/admin-lte/plugins/dropzone/dropzone.js', 'public/js/dropzone.js')
    .copy('node_modules/admin-lte/plugins/select2/js/select2.full.min.js', 'public/js/select2.full.min.js');


