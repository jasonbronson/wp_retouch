<?php

class WB_Plan
{
    public function __construct()
    {
        // register post type
        $plan = new CPT(array('post_type_name' => get_theme_mod('plan_post_type', 'plan'),
                'singular' => 'Plan',
                'plural' => 'Plans',
                'slug' => 'plan',
            ), array(
                'exclude_from_search' => true,
                'publicly_queryable' => false,
                'show_in_nav_menus' => false,
                'supports' => array('title', 'editor', 'excerpt'),
                'menu_icon' => 'dashicons-money',
            )
        );

        $plan->register_taxonomy(array(
                'taxonomy_name' => 'plan_category',
                'singular' => 'Plan Category',
                'plural' => 'Plan Categories',
                'slug' => 'plan_category',
            ), array(
                'show_in_nav_menus' => false,
            )
        );

        add_action('butterbean_register', array($this, 'th_register'), 10, 2);
    }

    public function th_register($butterbean, $post_type)
    {
        $butterbean->register_manager(
            'example',
            array(
                'label' => esc_html__('Example', 'your-textdomain'),
                'post_type' => 'plan',
                'context' => 'normal',
                'priority' => 'high',
            )
        );

        $manager = $butterbean->get_manager('example');
        $manager->register_section(
            'general',
            array(
                'label' => esc_html__('General', 'your-textdomain'),
                'icon' => 'dashicons-admin-settings',
            )
        );
        $manager->register_section(
            'button',
            array(
                'label' => esc_html__('Button', 'your-textdomain'),
                'icon' => 'dashicons-admin-links',
            )
        );
        $manager->register_section(
            'ribbon',
            array(
                'label' => esc_html__('Ribbon', 'your-textdomain'),
                'icon' => 'dashicons-sticky',
            )
        );

        $manager->register_control(
            'btn_text', // Same as setting name.
            array(
                'type' => 'text',
                'section' => 'button',
                'label' => esc_html__('Text', 'your-textdomain'),
                'description' => esc_html__('Enter the plan button text.', 'your-textdomain'),
                'attr' => array('class' => 'widefat', 'placeholder' => __('Add text', 'your-textdomain')),
            )
        );

        $manager->register_setting(
            'btn_text', // Same as control name.
            array(
                'sanitize_callback' => 'wp_filter_nohtml_kses',
            )
        );

        $manager->register_control(
            'btn_url',
            array(
                'type' => 'text',
                'section' => 'button',
                'label' => esc_html__('URL', 'your-textdomain'),
                'description' => esc_html__('Enter the URL that is valid and well-formed.', 'your-textdomain'),
                'attr' => array('class' => 'widefat', 'placeholder' => __('Add url', 'your-textdomain')),
            )
        );

        $manager->register_setting(
            'btn_url',
            array(
                'sanitize_callback' => 'esc_url_raw',
            )
        );

        $manager->register_control(
            'btn_xclass',
            array(
                'type' => 'text',
                'section' => 'button',
                'label' => esc_html__('Extra Class', 'your-textdomain'),
                'description' => esc_html__('Any extra classes you want to add.', 'your-textdomain'),
                'attr' => array('class' => 'widefat', 'placeholder' => __('Add extra class', 'your-textdomain')),
            )
        );

        $manager->register_setting(
            'btn_xclass',
            array(
                'sanitize_callback' => 'wp_filter_nohtml_kses',
            )
        );

        $manager->register_control(
            'ribbon_text',
            array(
                'type' => 'text',
                'section' => 'ribbon',
                'label' => esc_html__('Text', 'your-textdomain'),
                'description' => esc_html__('Enter the plan ribbon text.', 'your-textdomain'),
                'attr' => array('class' => 'widefat', 'placeholder' => __('Add text', 'your-textdomain')),
            )
        );

        $manager->register_setting(
            'ribbon_text',
            array(
                'sanitize_callback' => 'wp_filter_nohtml_kses',
            )
        );

        $manager->register_control(
            'ribbon_visibility',
            array(
                'type' => 'checkbox',
                'section' => 'ribbon',
                'label' => esc_html__('Display Ribbon', 'your-textdomain'),
                'description' => esc_html__('Wheather to display ribbon.', 'your-textdomain'),
                'attr' => array('class' => 'widefat', 'placeholder' => __('Add text', 'your-textdomain')),
            )
        );

        $manager->register_setting(
            'ribbon_visibility',
            array(
                'sanitize_callback' => 'wp_filter_nohtml_kses',
            )
        );

        $manager->register_control(
            'price',
            array(
                'type' => 'text',
                'section' => 'general',
                'label' => esc_html__('Price', 'your-textdomain'),
                'description' => esc_html__('Add price for the plan.', 'your-textdomain'),
                'attr' => array('class' => 'widefat', 'placeholder' => __('Add price', 'your-textdomain')),
            )
        );

        $manager->register_setting(
            'price',
            array(
                'sanitize_callback' => 'wp_filter_nohtml_kses',
            )
        );

        $manager->register_control(
            'currency',
            array(
                'type' => 'text',
                'section' => 'general',
                'label' => esc_html__('Currency', 'your-textdomain'),
                'description' => esc_html__('Add currency symbol for the plan', 'your-textdomain'),
                'attr' => array('class' => 'widefat', 'placeholder' => __('Add currency', 'your-textdomain')),
            )
        );

        $manager->register_setting(
            'currency',
            array(
                'sanitize_callback' => 'wp_filter_nohtml_kses',
            )
        );

        $manager->register_control(
            'recurrence',
            array(
                'type' => 'text',
                'section' => 'general',
                'label' => esc_html__('Recurrence', 'your-textdomain'),
                'description' => esc_html__('Add time duration for the plan.', 'your-textdomain'),
                'attr' => array('class' => 'widefat', 'placeholder' => __('Add recurrence', 'your-textdomain')),
            )
        );

        $manager->register_setting(
            'recurrence',
            array(
                'sanitize_callback' => 'wp_filter_nohtml_kses',
            )
        );
    }
}

$wb_plan = new WB_Plan();
