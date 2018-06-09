<?php

class WB_Testimonial
{
    public function __construct()
    {
        // register post type
        $testimonial = new CPT(array(
                'post_type_name' => 'testimonial',
                'singular' => 'Testimonial',
                'plural' => 'Testimonials',
                'slug' => 'testimonials',
            ), array(
                'exclude_from_search' => true,
                'publicly_queryable' => false,
                'show_in_nav_menus' => false,
                'supports' => array('title', 'editor', 'thumbnail'),
                'menu_icon' => 'dashicons-testimonial',
            )
        );

        $testimonial->register_taxonomy(array(
                'taxonomy_name' => 'testimonial_category',
                'singular' => 'Testimonial Category',
                'plural' => 'Testimonial Categories',
                'slug' => 'testimonial_category',
            ), array(
                'show_in_nav_menus' => false,
            )
        );

        add_action('butterbean_register', array($this, 'metaboxes'), 10, 2);
    }

    public function metaboxes($butterbean, $post_type)
    {
        $butterbean->register_manager('testimonial',
            array(
                'post_type' => 'testimonial',
                'context' => 'normal',
                'priority' => 'high',
                'label' => esc_html__('Details', 'your-textdomain'),
            )
        );

        $manager = $butterbean->get_manager('testimonial');

        $manager->register_section('general',
            array(
                'label' => esc_html__('General', 'your-textdomain'),
                'icon' => 'dashicons-admin-settings',
            )
        );

        $manager->register_control(
            'company',
            array(
                'type' => 'text',
                'section' => 'general',
                'label' => esc_html__('Company', 'your-textdomain'),
                'description' => esc_html__('Enter the name of the company.', 'your-textdomain'),
                'attr' => array('class' => 'widefat', 'placeholder' => __('Add company', 'your-textdomain')),
            )
        );

        $manager->register_setting(
            'company',
            array(
                'sanitize_callback' => 'wp_strip_all_tags',
            )
        );

        $manager->register_control(
            'occupation',
            array(
                'type' => 'text',
                'section' => 'general',
                'label' => esc_html__('Occupation', 'your-textdomain'),
                'description' => esc_html__('Enter the person\'s occupation.', 'your-textdomain'),
                'attr' => array('class' => 'widefat', 'placeholder' => __('Add occupation', 'your-textdomain')),
            )
        );

        $manager->register_setting(
            'occupation',
            array(
                'sanitize_callback' => 'wp_strip_all_tags',
            )
        );

        $manager->register_control(
            'url',
            array(
                'type' => 'url',
                'section' => 'general',
                'label' => esc_html__('URL', 'your-textdomain'),
                'description' => esc_html__('Enter the URL of the person\'s web site or page.', 'your-textdomain'),
                'attr' => array('class' => 'widefat', 'placeholder' => __('Add url', 'your-textdomain')),
            )
        );

        $manager->register_setting(
            'url',
            array(
                'sanitize_callback' => 'esc_url_raw',
            )
        );
    }
}

$wb_testimonial = new WB_Testimonial();
