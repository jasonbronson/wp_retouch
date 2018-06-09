<?php

function wb_isotope_shortcode($atts)
{
    $defaults = shortcode_atts(array(
        'id' => 'isotope',
        'xclass' => '',
        'post_type' => 'post',
        'post_template' => 'tiny',
        'post_style' => '',
        'posts_per_page' => 9,
        'col-lg' => '4',
        'col-md' => '4',
        'col-sm' => '6',
        'col-xs' => '12',
        'post_filter' => 'yes',
        'post_navigation' => 'yes',
        'gutter' => 'yes',
        'nav_container' => 'no',
    ), $atts);

    $query = new WB_Posts($defaults);

    $atts = array();
    $atts['id'] = $defaults['id'];
    $atts['class'] = $defaults['xclass'] ? 'isotope '.$defaults['xclass'] : 'isotope';
    if ($defaults['gutter'] == 'no') {
        $atts['class'] .= ' no-gutter';
    }

    ob_start();
    include locate_template('wb/shortcodes/inc/isotope.php');

    return ob_get_clean();
}
add_shortcode('wb_isotope', 'wb_isotope_shortcode');
