<?php

Kirki::add_field($config_id, array(
    'type' => 'slider',
    'settings' => 'wb_footer_layout',
    'label' => esc_attr__('Number of Columns', 'my_textdomain'),
    'section' => 'wb_footer_layout',
    'default' => 4,
    'choices' => array(
        'min' => '1',
        'max' => '4',
        'step' => '1',
    ),
));

Kirki::add_field($config_id, array(
    'type' => 'checkbox',
    'settings' => 'wb_layout',
    'label' => __('Enable box layout', 'my_textdomain'),
    'description' => __('Wheather to enable boxed layout', 'my_textdomain'),
    'section' => 'layout',
    'default' => '0',
    'priority' => 10,
));
