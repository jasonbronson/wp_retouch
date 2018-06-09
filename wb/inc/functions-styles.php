<?php

/* Add custom styles. */
add_action('wp_enqueue_scripts', 'wb_enqueue_styles', 11);
add_action('customize_controls_print_styles', 'customizer_styles', 99);

/**
 * Load stylesheets for the front end.
 *
 * @since  2.0.0
 */
function wb_enqueue_styles()
{
    $suffix = hybrid_get_min_suffix();

    /* Load magnific and owl carousel stylesheets. */
    wp_enqueue_style('magnific-popup', WB_CSS."magnific-popup.css", array(), '3.1.6');
    wp_enqueue_style('owl-carousel', WB_CSS."owl.carousel{$suffix}.css", array(), '2.1.6');
    wp_enqueue_style('simplecolorpicker', WB_CSS."jquery.simplecolorpicker.css", array(), '2.1.6');
    wp_enqueue_style('simplecolorpicker-fontawesome', WB_CSS."jquery.simplecolorpicker-fontawesome.css", array(), '2.1.6');
    wp_enqueue_style('bootstrap-toggle', WB_CSS."bootstrap-toggle{$suffix}.css", array(), '2.1.6');

    /* Load icon stylesheets. */
    wp_enqueue_style('themify-icons', WB_CSS.'themify-icons.css', array(), '3.1.6');
    wp_enqueue_style('genericons-neue', WB_CSS.'Genericons-Neue.css');
    wp_enqueue_style('font-awesome', WB_CSS."font-awesome{$suffix}.css");

    /* Load animation stylesheet. */
    wp_enqueue_style('animate', WB_CSS.'animate.css');

    /* Load gallery style if 'cleaner-gallery' is active. */
    if (current_theme_supports('cleaner-gallery')) {
        wp_enqueue_style('gallery', trailingslashit(HYBRID_CSS)."gallery{$suffix}.css");
    }

    /* Add custom fonts, used in the main stylesheet. */
    wp_enqueue_style('wb-fonts', wb_fonts_url(), array(), null);

    /* Load parent theme stylesheet if child theme is active. */
    if (is_child_theme()) {
        wp_enqueue_style('hybrid-parent');
    }

    /* Load active theme stylesheet. */
    wp_enqueue_style('hybrid-style');

    /* Add inline css. */
    wp_add_inline_style('hybrid-style', inline_css());

    /* Remove this plugin stylesheet. */
    wp_dequeue_style('auw-frontend-style');
}

/**
 * Load stylesheets for the customizer.
 *
 * @since  2.0.0
 */
function customizer_styles()
{
    wp_add_inline_style('kirki-customizer-css', kirki_inline_css());
}

if (!function_exists('wb_fonts_url')) :
/**
 * Register Google fonts for this theme.
 *
 * Create your own wb_fonts_url() function to override in a child theme.
 *
 * @since WB 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function wb_fonts_url()
{
    $fonts_url = '';
    $fonts = array();
    $subsets = 'cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese';

    /* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
    if ('off' !== _x('on', 'Roboto font: on or off', 'wb')) {
        $fonts[] = 'Roboto:100,300,400,500,700,900';
    }

    if ($fonts) {
        $fonts_url = add_query_arg(array(
            'family' => urlencode(implode('|', $fonts)),
            'subset' => urlencode($subsets),
        ), 'https://fonts.googleapis.com/css');
    }

    return $fonts_url;
}
endif;
