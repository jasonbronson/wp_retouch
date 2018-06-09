<?php

add_action('butterbean_register', 'butterbean_register', 10, 2);

function butterbean_register($butterbean, $post_type)
{
    $butterbean->register_manager(
        'page-settings',
        array(
            'label' => esc_html__('Page Settings', 'your-textdomain'),
            'post_type' => 'page',
            'context' => 'normal',
            'priority' => 'high',
        )
    );

    $manager = $butterbean->get_manager('page-settings');

    $manager->register_section(
        'general',
        array(
            'label' => esc_html__('General', 'your-textdomain'),
            'icon' => 'dashicons-admin-settings',
        )
    );

    $manager->register_control(
        'page-header', // Same as setting name.
        array(
            'type' => 'checkbox',
            'section' => 'general',
            'label' => esc_html__('Hide page header', 'your-textdomain'),
            'description' => esc_html__('Whether to hide the page header.', 'your-textdomain'),
        )
    );
    $manager->register_setting(
        'page-header', // Same as control name.
        array('type' => 'array', 'sanitize_callback' => 'sanitize_key')
    );
}
