<?php

/* Launch the Hybrid Core and WB framework. */
require_once trailingslashit(get_template_directory()).'library/hybrid.php';
require_once trailingslashit(get_template_directory()).'wb/class-tgm-plugin-activation.php';
require_once trailingslashit(get_template_directory()).'wb/wb.php';
new Hybrid();
new WoBootstrap();

/* Do theme setup on the 'after_setup_theme' hook. */
add_action('after_setup_theme', 'wb_theme_setup', 5);

/**
 * Theme setup function.  This function adds support for theme features and defines the default theme
 * actions and filters.
 *
 * @since  1.0.0
 */
function wb_theme_setup()
{
    // Theme layouts.
    add_theme_support('theme-layouts', array('default' => is_rtl() ? '2c-r' : '2c-l'));

    /* Enable custom template hierarchy. */
    add_theme_support('hybrid-core-template-hierarchy');

    /* The best thumbnail/image script ever. */
    add_theme_support('get-the-image');

    /* Breadcrumbs. Yay! */
    add_theme_support('breadcrumb-trail');

    /* Nicer [gallery] shortcode implementation. */
    add_theme_support('cleaner-gallery');

    // Automatically add feed links to <head>.
    add_theme_support('automatic-feed-links');

    // Post formats.
    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

    /* Handle content width for embeds and images. */
    hybrid_set_content_width(1070);

    // Add different image sizes
    add_image_size('large-16by9', 1280, 720, true);
    add_image_size('large-18by9', 1280, 640, true);
    add_image_size('large-4by3',  1280, 960, true);
    add_image_size('small-16by9', 800, 450, true);
    add_image_size('small-4by3',  800, 600, true);
}
