<?php

Kirki::add_section('wb_loader', array(
    'title' => __('Loader'),
    'description' => __( 'Here you will find all settings for loader.', 'textdomain' ),
    'panel' => 'wb_general', // Not typically needed.
    'priority' => 160,
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
));

Kirki::add_field( $config_id, array(
	'type'        => 'toggle',
	'settings'    => 'wb_loader',
	'label'       => __( 'Display Loader', 'my_textdomain' ),
    'description' => __( 'Whether to display loader before page load.', 'my_textdomain' ),
	'section'     => 'wb_loader',
	'default'     => '1',
	'priority'    => 10,
) );
