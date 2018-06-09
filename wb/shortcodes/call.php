<?php

function wb_call_shortcode($atts, $content = null)
{
    $defaults = shortcode_atts(array(
        'id' => '',
        'xclass' => '',
        'style' => 'default',
    ), $atts);

    $atts = array();
    if ($defaults['id']) {
        $atts['id'] = $defaults['id'];
    }
    $atts['class'] = $defaults['xclass'] ? 'wb-call '.$defaults['xclass'] : 'wb-call';
    $atts['class'] .= ' wb-call_'.$defaults['style'];

    ob_start();
    include locate_template('wb/shortcodes/inc/call.php');

    return ob_get_clean();
}
add_shortcode('wb_call', 'wb_call_shortcode');
