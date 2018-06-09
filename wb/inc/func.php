<?php

function display_page_header()
{
    if (get_post_meta(get_the_ID(), 'page-header', true)) {
        return false;
    } else {
        return true;
    }
}

function inline_css()
{
    ob_start();
    include locate_template('css/navbar-css.php');
    include locate_template('css/default-css.php');
    $markup = ob_get_clean();

    $default_color = apply_filters( 'wb_default_color', get_theme_mod('wb_secondary_color', 'default_value') );

    $replacements = array(
        'NAVBAR_BACKGROUND_COLOR' => get_theme_mod('wb_navbar_background_color', 'default_value'),
        'NAVBAR_LINK_COLOR' => get_theme_mod('wb_navbar_link_color', 'default_value'),
        'NAVBAR_LINK_HOVER_COLOR' => get_theme_mod('wb_navbar_link_hover_color', 'default_value'),
        'NAVBAR_TEXT_COLOR' => get_theme_mod('wb_navbar_color', 'default_value'),
        'NAVBAR_LINK_ACTIVE_COLOR' => get_theme_mod('wb_navbar_link_active_color', 'default_value'),
        'NAVBAR_LINK_DISABLED_COLOR' => get_theme_mod('wb_navbar_link_disabled_color', 'default_value'),
        'NAVBAR_BORDER_COLOR' => get_theme_mod('wb_navbar_border_color', 'default_value'),
        'NAVBAR_INPUT_HOVER_COLOR' => get_theme_mod('wb_navbar_input_focus_color', 'default_value'),
        'NAVBAR_PLACEHOLDER_COLOR' => get_theme_mod('wb_navbar_input_placeholder_color', 'default_value'),
        'SECONDARY_COLOR' => $default_color,
    );

    foreach ($replacements as $variable => $value) {
        $markup = str_replace($variable, $value, $markup);
    }

    return $markup;
}

function kirki_inline_css()
{
    ob_start();
    include locate_template('wb/inc/kirki-inline-css.php');

    return ob_get_clean();
}
