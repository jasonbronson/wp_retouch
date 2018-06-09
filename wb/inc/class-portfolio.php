<?php

class WB_Portfolio_Project
{
    public function __construct()
    {
        // register portfolio_project post type
        $portfolio = new CPT(array('post_type_name' => 'portfolio_project',
                'singular' => 'Project',
                'plural' => 'Projects',
                'slug' => 'projects',
            ), array(
                'show_in_nav_menus' => false,
                'exclude_from_search' => true,
                'has_archive' => true,
                'supports' => array('title', 'editor', 'thumbnail', 'comments', 'post-formats', 'theme-layouts'),
                'menu_icon' => 'dashicons-portfolio',
            )
        );

        $portfolio->register_taxonomy(array(
            'taxonomy_name' => 'portfolio_category',
            'singular' => 'Portfolio Category',
            'plural' => 'Portfolio Categories',
            'slug' => 'portfolio_category',
        ),array(
            'show_in_nav_menus' => false,
        ));

        $portfolio->register_taxonomy(array(
            'taxonomy_name' => 'portfolio_tag',
            'singular' => 'Portfolio Tag',
            'plural' => 'Portfolio Tags',
            'slug' => 'portfolio_tag',
        ), array(
            'show_in_nav_menus' => false,
            'hierarchical' => false,
            'update_count_callback' => '_update_post_term_count',
        ));

        add_action('butterbean_register', array($this, 'metaboxes'), 10, 2);
        add_action('load-post.php',       array($this, 'post_format_support_filter'));
        add_action('load-post-new.php',   array($this, 'post_format_support_filter'));
        add_action('load-edit.php',       array($this, 'post_format_support_filter'));
    }

    public function metaboxes($butterbean, $post_type)
    {
        $butterbean->register_manager('portfolio_project',
            array(
                'post_type' => 'portfolio_project',
                'context' => 'normal',
                'priority' => 'high',
                'label' => esc_html__('Details', 'your-textdomain'),
            )
        );

        $manager = $butterbean->get_manager('portfolio_project');

        $manager->register_section('general',
            array(
                'label' => esc_html__('General', 'your-textdomain'),
                'icon' => 'dashicons-admin-settings',
            )
        );

        $manager->register_section('date',
            array(
                'label' => esc_html__('Date', 'your-textdomain'),
                'icon' => 'dashicons-clock',
            )
        );

        $manager->register_section('description',
            array(
                'label' => esc_html__('Description', 'your-textdomain'),
                'icon' => 'dashicons-edit',
            )
        );

        $url_args = array(
            'type' => 'url',
            'section' => 'general',
            'attr' => array('class' => 'widefat', 'placeholder' => __('Add url', 'your-textdomain')),
            'label' => esc_html__('URL', 'your-textdomain'),
            'description' => esc_html__('Enter the URL of the project web page.', 'your-textdomain'),
        );

        $client_args = array(
            'type' => 'text',
            'section' => 'general',
            'attr' => array('class' => 'widefat', 'placeholder' => __('Add client', 'your-textdomain')),
            'label' => esc_html__('Client', 'your-textdomain'),
            'description' => esc_html__('Enter the name of the client for the project.', 'your-textdomain'),
        );

        $location_args = array(
            'type' => 'text',
            'section' => 'general',
            'attr' => array('class' => 'widefat', 'placeholder' => __('Add location', 'your-textdomain')),
            'label' => esc_html__('Location', 'your-textdomain'),
            'description' => esc_html__('Enter the physical location of the project.', 'your-textdomain'),
        );

        $start_date_args = array(
            'type' => 'datetime',
            'section' => 'date',
            'show_time' => false,
            'label' => esc_html__('Start Date', 'your-textdomain'),
            'description' => esc_html__('Select the date the project began.', 'your-textdomain'),
        );

        $end_date_args = array(
            'type' => 'datetime',
            'section' => 'date',
            'show_time' => false,
            'label' => esc_html__('End Date', 'your-textdomain'),
            'description' => esc_html__('Select the date the project was completed.', 'your-textdomain'),
        );

        $manager->register_field('url',        $url_args,        array('sanitize_callback' => 'esc_url_raw'));
        $manager->register_field('client',     $client_args,     array('sanitize_callback' => 'wp_strip_all_tags'));
        $manager->register_field('location',   $location_args,   array('sanitize_callback' => 'wp_strip_all_tags'));
        $manager->register_field('start_date', $start_date_args, array('type' => 'datetime'));
        $manager->register_field('end_date',   $end_date_args,   array('type' => 'datetime'));

        $excerpt_args = array(
            'type' => 'excerpt',
            'section' => 'description',
            'label' => esc_html__('Description', 'your-textdomain'),
            'description' => esc_html__('Write a short description (excerpt) of the project.', 'your-textdomain'),
        );

        $manager->register_control('excerpt', $excerpt_args);
    }

    public function post_format_support_filter()
    {
        $screen = get_current_screen();

        // Bail if not on the projects screen.
        if (empty($screen->post_type) ||  $screen->post_type !== 'portfolio_project') {
            return;
        }

        // Check if the current theme supports formats.
        if (current_theme_supports('post-formats')) {
            $formats = get_theme_support('post-formats');

            // If we have formats, add theme support for only the allowed formats.
            if (isset($formats[0])) {
                $new_formats = array_intersect($formats[0], $this->get_allowed_project_formats());

                // Remove post formats support.
                remove_theme_support('post-formats');

                // If the theme supports the allowed formats, add support for them.
                if ($new_formats) {
                    add_theme_support('post-formats', $new_formats);
                }
            }
        }

        // Filter the default post format.
        add_filter('option_default_post_format', array($this, 'default_post_format_filter'), 95);
    }

    public function default_post_format_filter($format)
    {
        return in_array($format, $this->get_allowed_project_formats()) ? $format : 'standard';
    }

    public function get_allowed_project_formats()
    {
        return array('image', 'gallery', 'video');
    }
}

$wb_portfolio_project = new WB_Portfolio_Project();
