<?php

add_shortcode('wb_carousel', 'wb_carousel_shortcode');

function wb_carousel_shortcode($atts, $content = null)
{
    $defaults = shortcode_atts(array(
        'id' => 'carousel',
        'xclass' => '',
        'post_type' => 'post',
        'exclude_ids' => '',
        'posts_per_page' => 5,
        'navigation_style' => 'default',
        'post_template' => '',
        'post_style' => 'default',
        'margin' => '30',
        'items_xs' => '1',
        'items_sm' => '2',
        'items_lg' => '3',
        'dots' => 'false',
        'navigation' => 'true',
        'responsive_class' => 'true',
    ), $atts);

    $query = new WB_Posts($defaults);

    $atts = array();
    $atts['id'] = $defaults['id'];
    $atts['class'] = $defaults['xclass'] ? 'owl-carousel owl-theme '.$defaults['xclass'] : 'owl-carousel owl-theme';
    $atts['class'] .=  ' navigation-'.$defaults['navigation_style'];

    ob_start();
    include locate_template('wb/shortcodes/inc/carousel.php');
    $markup = ob_get_clean();

    $replacements = array(
        'CAROUSEL_ID' => $defaults['id'],
        'CAROUSEL_ITEMS_XS' => $defaults['items_xs'],
        'CAROUSEL_ITEMS_SM' => $defaults['items_sm'],
        'CAROUSEL_ITEMS_LG' => $defaults['items_lg'],
        'CAROUSEL_RESPONSIVE_CLASS' => $defaults['responsive_class'],
        'CAROUSEL_DOTS' => $defaults['dots'],
        'CAROUSEL_NAV' => $defaults['navigation'],
        'CAROUSEL_MARGIN' => $defaults['margin'],
    );

    foreach ($replacements as $variable => $value) {
        $markup = str_replace($variable, $value, $markup);
    }

    return $markup;
}
