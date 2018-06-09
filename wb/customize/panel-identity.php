<?php

Kirki::add_field($config_id, array(
    'type' => 'spacing',
    'settings' => 'wb_logo_spacing',
    'label' => __('Logo Spacing Control', 'my_textdomain'),
    'section' => 'title_tagline',
    'default' => array(
        'top' => '0',
        'bottom' => '0',
        'left' => '0',
        'right' => '0',
    ),
    'priority' => 8,
    'output' => array(
        array(
            'element' => '.navbar-brand > img',
            'property' => 'padding',
            'units' => 'px',
        ),
    ),
));
