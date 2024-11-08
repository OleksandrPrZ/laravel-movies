const mix = require('laravel-mix');

console.log("Запущен webpack.mix.cjs");

mix.js('resources/js/app.js', 'public/js')
    .copy('node_modules/admin-lte/dist/css/adminlte.min.css', 'public/css/adminlte.css')
    .copy('node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css', 'public/css/fontawesome.css')
    .copy('node_modules/admin-lte/plugins/jquery/jquery.min.js', 'public/js/jquery.js')
    .copy('node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js', 'public/js/bootstrap.bundle.js')
    .copy('node_modules/admin-lte/dist/js/adminlte.min.js', 'public/js/adminlte.js');

