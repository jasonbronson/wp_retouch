<?php

class WB_Client
{
    public function __construct()
    {
        // register client post type
        $client = new CPT(array('post_type_name' => 'client',
            'singular' => 'Client',
            'plural' => 'Clients',
            'slug' => 'clients',
        ), array(
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'show_in_nav_menus' => false,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-businessman',
        ));

        $client->register_taxonomy(
            array(
                'taxonomy_name' => 'client_category',
                'singular' => 'Client Category',
                'plural' => 'Client Categories',
                'slug' => 'client_category',
            ), array(
                'show_in_nav_menus' => false,
            )
        );
    }
}

$wb_client = new WB_Client();
