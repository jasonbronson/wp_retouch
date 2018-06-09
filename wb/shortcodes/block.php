<?php

function wb_block($atts, $content = null)
{
    $defaults = shortcode_atts(array(
        'id' => '',
        'xclass' => '',
        'container' => true,
    ), $atts);

    $markup = '<section'.($defaults['id'] ? ' id="'.$defaults['id'].'"' : '').($defaults['xclass'] ? ' class="'.$defaults['xclass'].'"' : '').'>
        '.(($defaults['container'] ? '<div class="container">' : '')).'
            '.do_shortcode($content).'
        '.(($defaults['container'] ? '</div>' : '')).'
    </section>';

    return $markup;
}

add_shortcode('block', 'wb_block');

function wb_div($atts, $content = null)
{
    $defaults = shortcode_atts(array(
        'id' => '',
        'class' => '',
    ), $atts);

    $markup = '<div'.($defaults['id'] ? 'class="'.$defaults['id'].'"' : '').($defaults['class'] ? 'class="'.$defaults['class'].'"' : '').'>
        '.do_shortcode($content).'
    </div>';

    return $markup;
}

add_shortcode('wb_div', 'wb_div');

function wb_block_header($atts)
{
    $defaults = shortcode_atts(array(
        'id' => '',
        'class' => '',
        'title' => '',
        'content' => '',
    ), $atts);

    $markup = '<div class="block_header'.($defaults['class'] ? ' '.$defaults['class'] : '').'"'.($defaults['id'] ? ' id="'.$defaults['id'].'"' : '').'>
        <h2 class="block_title">'.$defaults['title'].'</h2>
        <p class="block_lead">'.$defaults['content'].'</p>
    </div>';

    return $markup;
}

add_shortcode('block_header', 'wb_block_header');
