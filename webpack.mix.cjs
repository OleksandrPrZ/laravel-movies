const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ])
    .copy('node_modules/admin-lte/dist/css/adminlte.min.css', 'public/css/adminlte.min.css')
    .copy('node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css', 'public/css/all.min.css')
    .copy('node_modules/admin-lte/plugins/dropzone/min/dropzone.min.css', 'public/css/dropzone.css')
    .copy('node_modules/admin-lte/plugins/select2/css/select2.min.css', 'public/css/select2.min.css')
    .copy('node_modules/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css', 'public/css/tempusdominus-bootstrap-4.min.css')
    .copy('node_modules/admin-lte/plugins/fontawesome-free/webfonts', 'public/webfonts')
    .copy('node_modules/admin-lte/plugins/jquery/jquery.min.js', 'public/js/jquery.js')
    .copy('node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js', 'public/js/bootstrap.bundle.min.js')
    .copy('node_modules/admin-lte/dist/js/adminlte.min.js', 'public/js/adminlte.min.js')
    .copy('node_modules/admin-lte/plugins/bootstrap-switch/js/bootstrap-switch.min.js', 'public/js/bootstrap-switch.js')
    .copy('node_modules/admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js', 'public/js/tempusdominus-bootstrap-4.min.js')
    .copy('node_modules/admin-lte/plugins/dropzone/dropzone.js', 'public/js/dropzone.js')
    .copy('node_modules/admin-lte/plugins/select2/js/select2.full.min.js', 'public/js/select2.full.min.js')
    .copy('node_modules/admin-lte/plugins/jquery-ui/jquery-ui.min.js', 'public/js/jquery-ui.min.js')
    .copy('node_modules/admin-lte/plugins/moment/moment.min.js', 'public/js/moment.min.js');


