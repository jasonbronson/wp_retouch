<?php

add_shortcode('icon_box', 'wb_icon_box');

function wb_icon_box($atts, $content = null)
{
    $defaults = shortcode_atts(array(
        'id' => '',
        'xclass' => '',
        'icon' => 'fa fa-check-circle-o',
        'title' => 'Title',
        'layout' => 'default',
    ), $atts);

    $atts = array();
    if ($defaults['id']) {
        $atts['id'] = $defaults['id'];
    }
    $atts['class'] = $defaults['xclass'] ? 'iconbox '.$defaults['xclass'] : 'icon-box';
    $atts['class'] .= ' icon-box_'.$defaults['layout'];

    ob_start();
    include locate_template('wb/shortcodes/inc/icon-box.php');

    return ob_get_clean();
}
