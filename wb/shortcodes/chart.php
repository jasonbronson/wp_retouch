<?php

function wb_pie_shortcode($atts, $content = null)
{
    $defaults = shortcode_atts(array(
        'xclass' => '',
        'label' => 'Label',
        'percent' => '1',
        'bar_color' => '#ef1e25',
        'track_color' => '#f2f2f2',
        'scale_color' => 'false',
        'line_cap' => 'square',
        'line_width' => '4',
        'size' => '125',
    ), $atts);

    $atts = array();
    $atts['class'] = $defaults['xclass'] ? 'chart '.$defaults['xclass'] : 'chart';
    $atts['data-percent'] = $defaults['percent'];
    $atts['data-bar-color'] = $defaults['bar_color'];
    $atts['data-track-color'] = $defaults['track_color'];
    $atts['data-scale-color'] = $defaults['scale_color'];
    $atts['data-line-cap'] = $defaults['line_cap'];
    $atts['data-line-width'] = $defaults['line_width'];
    $atts['data-size'] = $defaults['size'];

    ob_start();
    include locate_template('wb/shortcodes/inc/chart.php');

    return ob_get_clean();
}
add_shortcode('chart', 'wb_pie_shortcode');
