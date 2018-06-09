<?php
Kirki::add_field( $config_id, array(
	'type'        => 'color',
	'settings'    => 'wb_secondary_color',
	'label'       => __( 'Default Color', 'my_textdomain' ),
	'description' => __( 'Default color for the site.', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '#16a085',
	'priority'    => 10,
	'alpha'       => true,
) );
