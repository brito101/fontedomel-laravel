const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .copy("resources/img", "public/img")
    .sass("resources/sass/app.scss", "public/css")
    /** Admin */
    .scripts(["resources/js/company.js"], "public/js/company.js")
    .scripts(["resources/js/address.js"], "public/js/address.js")
    .scripts(["resources/js/phone.js"], "public/js/phone.js")

    /** Web */
    .sass("resources/views/site/assets/scss/app.scss", "public/site/css")
    .copy("node_modules/animate.css/animate.min.css", "public/site/css")
    .copy("node_modules/boxicons", "public/site/boxicons")
    .copy("node_modules/jquery/dist/jquery.min.js", "public/site/js")
    .copy(
        "node_modules/bootstrap/dist/js/bootstrap.bundle.min.js",
        "public/site/js"
    )
    .copy(
        "resources/views/site/assets/OwlCarousel2-2.3.4/dist/owl.carousel.min.js",
        "public/site/js"
    )
    .copy(
        "resources/views/site/assets/Magnific-Popup/dist/jquery.magnific-popup.min.js",
        "public/site/js"
    )
    .copy(
        "resources/views/site/assets/jquery-nice-select-1.1.0/js/jquery.nice-select.min.js",
        "public/site/js"
    )
    .copy("resources/views/site/assets/js/wow.min.js", "public/site/js")
    .copy("resources/views/site/assets/js/jquery.ajaxchimp.min.js", "public/site/js")
    .copy("resources/views/site/assets/js/form-validator.min.js", "public/site/js")
    .scripts(["resources/views/site/assets/js/mainmenu.js"], "public/site/js/mainmenu.js")
    .scripts(
        ["resources/views/site/assets/js/contact-form-script.js"],
        "public/site/js/contact-form-script.js"
    )
    .scripts(["resources/views/site/assets/js/custom.js"], "public/site/js/custom.js")
    .copy("resources/views/site/assets/img", "public/site/img")

    .options({
        processCssUrls: false,
    })
    .sourceMaps();
