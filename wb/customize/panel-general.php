<?php

Kirki::add_panel('wb_general', array(
    'priority' => 10,
    'title' => __('General', 'textdomain'),
    'description' => __('General settings for the site.', 'textdomain'),
));


function wb_customize_registery($wp_customize)
{
    $wp_customize->get_section('layout')->panel = 'wb_general';
    $wp_customize->get_section('colors')->panel = 'wb_general';
    $wp_customize->get_section('header_image')->panel = 'wb_general';
    $wp_customize->get_section('background_image')->panel = 'wb_general';
}
add_action('customize_register', 'wb_customize_registery');
