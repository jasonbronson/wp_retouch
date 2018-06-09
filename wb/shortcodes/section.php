<?php

function wb_section_shortcode($atts, $content = null)
{
    $defaults = shortcode_atts(array(
        'id' => '',
        'xclass' => '',
        'title' => '',
        'description' => '',
        'type' => 'advanced',
        'container' => 'yes',
        'gutter' => 'yes',
    ), $atts);

    $atts = array();
    if ($defaults['id']) {
        $atts['id'] = $defaults['id'];
    }
    $atts['class'] = $defaults['xclass'] ? 'block '.$defaults['xclass'] : 'block';
    $atts['class'] .=  ' block-'.$defaults['type'];
    if ($defaults['gutter'] == 'no') {
        $atts['class'] .= ' no-gutter';
    }

    ob_start();
    include locate_template('wb/shortcodes/inc/section.php');

    return ob_get_clean();
}
add_shortcode('wb_section', 'wb_section_shortcode');
