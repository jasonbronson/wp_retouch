<?php

function wb_counter_shortcode($atts)
{
    $defaults = shortcode_atts(array(
        'xclass' => '',
        'text' => '',
        'label' => '',
    ), $atts);

    $atts = array();
    $atts['class'] = $defaults['xclass'] ? 'counter '.$defaults['xclass'] : 'counter';

    ob_start();
    include locate_template('wb/shortcodes/inc/counter.php');

    return ob_get_clean();
}
add_shortcode('counter', 'wb_counter_shortcode');
