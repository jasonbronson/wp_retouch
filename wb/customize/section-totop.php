<?php

Kirki::add_section('wb_totop', array(
    'title' => __('jQuery toTop'),
    'description' => __( 'Here you will find all settings for jQuery toTop plugin.', 'textdomain' ),
    'panel' => 'wb_general', // Not typically needed.
    'priority' => 160,
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
));

Kirki::add_field( $config_id, array(
	'type'        => 'toggle',
	'settings'    => 'wb_totop',
	'label'       => __( 'Enable toTop', 'my_textdomain' ),
    'description' => __( 'Whether to display toTop after scroll.', 'my_textdomain' ),
	'section'     => 'wb_totop',
	'default'     => '1',
	'priority'    => 10,
) );
