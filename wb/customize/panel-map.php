<?php

Kirki::add_section( 'wb_map_section', array(
    'title'       => __( 'Map', 'textdomain' ),
    'description' => __( 'You need to paste your google map API key and Place ID below to show map on contact page.', 'textdomain' ),
    'panel'          => 'wb_general', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_field( $config_id, array(
	'type'     => 'text',
	'settings' => 'wb_api_key',
	'label'    => __( 'API key', 'my_textdomain' ),
	'section'  => 'wb_map_section',
	'description'  => esc_attr__( 'Paste your google API key here.', 'my_textdomain' ),
	'priority' => 10,
) );

Kirki::add_field( $config_id, array(
	'type'     => 'text',
	'settings' => 'wb_place_id',
	'label'    => __( 'Place ID', 'my_textdomain' ),
	'section'  => 'wb_map_section',
	'description'  => esc_attr__( 'Place IDs uniquely identify a place in the Google Places database and on Google Maps.', 'my_textdomain' ),
	'priority' => 10,
) );
