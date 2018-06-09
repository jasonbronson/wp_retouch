<?php

# Call late so child themes can override.
add_action('after_setup_theme', 'hybrid_base_custom_logo_setup', 15);

/**
 * Adds support for the WordPress 'custom-background' theme feature.
 *
 * @since  1.0.0
 */
function hybrid_base_custom_logo_setup()
{
    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    ));
}
