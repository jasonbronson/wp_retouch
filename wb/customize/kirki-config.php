<?php

$config_id = 'wb_theme';

Kirki::add_config($config_id, array(
    'capability' => 'edit_theme_options',
    'option_type' => 'theme_mod',
));
