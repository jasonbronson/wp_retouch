<?php

class WB_Person
{
    public function __construct()
    {
        // register person post type
        $person = new CPT(array(
                'post_type_name' => 'person',
                'singular' => 'Person',
                'plural' => 'People',
                'slug' => 'people',
            ), array(
                'exclude_from_search' => true,
                'publicly_queryable' => false,
                'show_in_nav_menus' => false,
                'supports' => array('title', 'editor', 'thumbnail'),
                'menu_icon' => 'dashicons-groups',
            )
        );

        $person->register_taxonomy(array(
            'taxonomy_name' => 'person_category',
            'singular' => 'Person Category',
            'plural' => 'Person Categories',
            'slug' => 'person_category',
        ), array(
            'show_in_nav_menus' => false,
        ));

        add_action('butterbean_register', array($this, 'metaboxes'), 10, 2);
    }

    public function metaboxes($butterbean, $post_type)
    {
        $butterbean->register_manager('person',
            array(
                'post_type' => 'person',
                'context' => 'normal',
                'priority' => 'high',
                'label' => esc_html__('Details', 'your-textdomain'),
            )
        );

        $manager = $butterbean->get_manager('person');

        $manager->register_section('general',
            array(
                'label' => esc_html__('General', 'your-textdomain'),
                'icon' => 'dashicons-admin-settings',
            )
        );

        $manager->register_section('links',
            array(
                'label' => esc_html__('Links', 'your-textdomain'),
                'icon' => 'dashicons-admin-links',
            )
        );

        $manager->register_control(
            'company',
            array(
                'type' => 'text',
                'section' => 'general',
                'label' => esc_html__('Company', 'your-textdomain'),
                'description' => esc_html__('Enter the name of the person\'s company.', 'your-textdomain'),
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
                'description' => esc_html__('Enter the URL of the person\'s company web site or page.', 'your-textdomain'),
                'attr' => array('class' => 'widefat', 'placeholder' => __('Add url', 'your-textdomain')),
            )
        );

        $manager->register_setting(
            'url',
            array(
                'sanitize_callback' => 'esc_url_raw',
            )
        );

        $manager->register_control(
            'urls',
            array(
                'type' => 'textarea',
                'section' => 'links',
                'label' => esc_html__('URLs', 'your-textdomain'),
                'description' => esc_html__('Enter the URLs of the person\'s web site or page separated by new line.', 'your-textdomain'),
                'attr' => array('class' => 'widefat', 'placeholder' => __('Add urls', 'your-textdomain')),
            )
        );

        $manager->register_setting(
            'urls',
            array(
                'sanitize_callback' => 'esc_textarea',
            )
        );
    }
}

$wb_person = new WB_Person();
