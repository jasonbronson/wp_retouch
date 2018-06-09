<?php

function wb_posts($atts = array())
{
    $defaults = shortcode_atts(array(
        'id' => 'posts',
        'xclass' => '',
        'post_type' => 'post',
        'exclude_ids' => '',
        'post_template' => 'default',
        'post_style' => '',
        'posts_per_page' => 10,
        'navigation' => 'yes',
        'col-lg' => '',
        'col-md' => '',
        'col-sm' => '',
        'col-xs' => '',
        'post_class' => '',
        'gutter' => 'yes',
    ), $atts);

    $query = new WB_Posts($defaults);

    $atts = array();
    $atts['id'] = $defaults['id'];
    $atts['class'] = $defaults['xclass'] ? 'posts '.$defaults['xclass'] : 'posts';

    if ($defaults['gutter'] == 'no') {
        $atts['class'] .= ' no-gutter';
    }


    ob_start();
    include locate_template('wb/shortcodes/inc/posts.php');
    $markup = ob_get_clean();

    return $markup;
}

add_shortcode('wb_posts', 'wb_posts');
