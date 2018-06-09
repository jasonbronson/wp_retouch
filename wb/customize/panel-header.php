<?php

Kirki::add_panel('wb_site_header', array(
    'priority' => 21,
    'title' => __('Site Header', 'textdomain'),
    'description' => __('All settings for site header.', 'textdomain'),
));

Kirki::add_section('wb_navbar', array(
    'title' => __('Navbar'),
    'description' => __('You can easily change the navbar style, check the following settings.'),
    'panel' => 'wb_site_header', // Not typically needed.
    'priority' => 160,
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
));

Kirki::add_section('wb_header_js', array(
    'title' => __('Additional JS'),
    'description' => __('You can easily add additional scripts in your site header, check the following settings.'),
    'panel' => 'wb_site_header', // Not typically needed.
    'priority' => 160,
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
));

Kirki::add_field($config_id, array(
    'type' => 'color',
    'settings' => 'wb_navbar_color',
    'label' => __('Color', 'my_textdomain'),
    'description' => __('Choose color for the primary header.', 'my_textdomain'),
    'section' => 'wb_navbar',
    'default' => '#000000',
    'priority' => 10,
));

Kirki::add_field($config_id, array(
    'type' => 'color',
    'settings' => 'wb_navbar_link_color',
    'label' => __('Link color', 'my_textdomain'),
    'description' => __('Choose link color for the primary header.', 'my_textdomain'),
    'section' => 'wb_navbar',
    'default' => '#000000',
    'priority' => 10,
));

Kirki::add_field($config_id, array(
    'type' => 'color',
    'settings' => 'wb_navbar_link_hover_color',
    'label' => __('Link hover color', 'my_textdomain'),
    'description' => __('Choose link hover color for the primary header.', 'my_textdomain'),
    'section' => 'wb_navbar',
    'default' => '#000000',
    'priority' => 10,
));

Kirki::add_field($config_id, array(
    'type' => 'color',
    'settings' => 'wb_navbar_link_active_color',
    'label' => __('Link active color', 'my_textdomain'),
    'description' => __('Choose link active color for the primary header.', 'my_textdomain'),
    'section' => 'wb_navbar',
    'default' => '#000000',
    'priority' => 10,
));

Kirki::add_field($config_id, array(
    'type' => 'color',
    'settings' => 'wb_navbar_link_disabled_color',
    'label' => __('Link disabled color', 'my_textdomain'),
    'description' => __('Choose link disabled color for the primary header.', 'my_textdomain'),
    'section' => 'wb_navbar',
    'default' => '#000000',
    'priority' => 10,
));

Kirki::add_field($config_id, array(
    'type' => 'color',
    'settings' => 'wb_navbar_background_color',
    'label' => __('Background Color', 'my_textdomain'),
    'description' => __('Choose background color for the primary header.', 'my_textdomain'),
    'section' => 'wb_navbar',
    'default' => '#ffffff',
    'priority' => 10,
));

Kirki::add_field($config_id, array(
    'type' => 'color',
    'settings' => 'wb_navbar_border_color',
    'label' => __('Border color', 'my_textdomain'),
    'description' => __('Choose border color for the primary header.', 'my_textdomain'),
    'section' => 'wb_navbar',
    'default' => '#eeeeee',
    'priority' => 10,
));

Kirki::add_field($config_id, array(
    'type' => 'color',
    'settings' => 'wb_navbar_input_focus_color',
    'label' => __('Input focus color', 'my_textdomain'),
    'description' => __('Choose input focus color for the primary header.', 'my_textdomain'),
    'section' => 'wb_navbar',
    'default' => '#eeeeee',
    'priority' => 10,
));

Kirki::add_field($config_id, array(
    'type' => 'color',
    'settings' => 'wb_navbar_input_placeholder_color',
    'label' => __('Input placeholder color', 'my_textdomain'),
    'description' => __('Choose input placeholder color for the primary header.', 'my_textdomain'),
    'section' => 'wb_navbar',
    'default' => '#eeeeee',
    'priority' => 10,
));

Kirki::add_field($config_id, array(
    'type' => 'text',
    'settings' => 'wb_header_google_analytics_id',
    'label' => __('Google Analytics ID', 'my_textdomain'),
    'description' => __('Enter in your Google Analytics ID to enable website traffic reporting. eg. "UA-xxxxxx-xx', 'my_textdomain'),
    'section' => 'wb_header_js',
    'priority' => 10,
));

Kirki::add_field($config_id, array(
    'type' => 'kirki-code',
    'settings' => 'wb_header_js',
    'label' => __('JS', 'my_textdomain'),
    'description' => __('Enter in any custom script to include in your sites header. Be sure to use double quotes for string', 'my_textdomain'),
    'section' => 'wb_header_js',
    'priority' => 10,
    'default' => '',
    'choices' => array(
        'language' => 'javascript',
        'theme' => 'kirki-dark',
    ),
));
