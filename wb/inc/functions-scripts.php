<?php

/* Add custom scripts. */
add_action('wp_enqueue_scripts', 'wb_enqueue_scripts', 5);

/**
 * Load scripts for the front end.
 *
 * @since  2.0.0
 */
function wb_enqueue_scripts()
{
    $suffix = hybrid_get_min_suffix();

    wp_enqueue_script('bootstrap',           WB_JS."bootstrap{$suffix}.js",                array('jquery'), '3.3.5', true);
    wp_enqueue_script('magnific-popup',      WB_JS."jquery.magnific-popup{$suffix}.js",    array('jquery'), '3.1.6', true);
    wp_enqueue_script('jquery-toTop',        WB_JS."jquery.toTop{$suffix}.js",             array('jquery'), '3.1.6', true);
    wp_enqueue_script('owl-carousel',        WB_JS."owl.carousel{$suffix}.js",             array('jquery'), '2.1.6', true);
    wp_enqueue_script('isotope',             WB_JS."isotope.pkgd{$suffix}.js",             array('jquery'), '2.2.2', true);
    wp_enqueue_script('pushy',               WB_JS."pushy{$suffix}.js",                    array('jquery'), '2.1.2', true);
    wp_enqueue_script('simplecolorpicker',   WB_JS."jquery.simplecolorpicker.js",          array('jquery'), '2.1.2', false);
    wp_enqueue_script('bootstrap-toggle',    WB_JS."bootstrap-toggle{$suffix}.js",         array('jquery'), '2.1.2', false);
    wp_enqueue_script('easypiechart',        WB_JS."jquery.easypiechart{$suffix}.js",         array('jquery'), '2.1.2', false);
    wp_enqueue_script('main',                WB_JS.'main.js',                              array('jquery'), '1.0.0', true);
}
