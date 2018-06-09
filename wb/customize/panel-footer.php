<?php

Kirki::add_panel('wb_footer', array(
    'priority' => 22,
    'title' => __('Footer', 'textdomain'),
    'description' => __( 'All settings for site footer.', 'textdomain' ),
));

Kirki::add_section('wb_footer_text', array(
    'title' => __('Text'),
    'panel' => 'wb_footer', // Not typically needed.
    'priority' => 160,
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
));

Kirki::add_section('wb_footer_layout', array(
    'title' => __('Layout'),
    'panel' => 'wb_footer', // Not typically needed.
    'priority' => 160,
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
));

Kirki::add_section('wb_footer_js', array(
    'title' => __('Additional Scripts'),
    'panel' => 'wb_footer', // Not typically needed.
    'priority' => 160,
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
));

Kirki::add_field($config_id, array(
    'type' => 'text',
    'settings' => 'wb_footer_text',
    'label' => __('Copyright Text', 'my_textdomain'),
    'section' => 'wb_footer_text',
    'priority' => 10,
));

Kirki::add_field($config_id, array(
    'type' => 'kirki-code',
    'settings' => 'wb_footer_js',
    'label' => __('Custom Scripts', 'my_textdomain'),
    'description' => __('Enter in any custom script to include in your sites footer. Be sure to use double quotes for string', 'my_textdomain'),
    'section' => 'wb_footer_js',
    'default' => '',
    'priority' => 10,
    'choices' => array(
        'language' => 'javascript',
        'theme' => 'kirki-dark',
    ),
));
