<?php

function wb_plan_shortcode($atts, $content = null)
{
    $defaults = shortcode_atts(array(
        'id' => '',
        'xclass' => '',
        'post_type' => 'plan',
        'posts_per_page' => 3,
        'col-lg' => '4',
        'col-md' => '6',
        'col-sm' => '6',
        'col-xs' => '12',
        'gutter' => 'yes',
    ), $atts);
    $query = new WB_Posts($defaults);
    $atts = array();
    if ($defaults['id']) {
        $atts['id'] = $defaults['id'];
    }
    $atts['class'] = $defaults['xclass'] ? 'wb-plan '.$defaults['xclass'] : 'wb-plan';
    if ($defaults['gutter'] == 'no') {
        $atts['class'] .= ' no-gutter';
    }
    ob_start();
    include locate_template('wb/shortcodes/inc/plan.php');

    return ob_get_clean();
}
add_shortcode('wb_plan', 'wb_plan_shortcode');
