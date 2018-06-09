<?php

function wb_blog($atts = array())
{
    $defaults = shortcode_atts(array(
        'posts_per_page' => 5,
        'post_navigation' => 'yes',
    ), $atts);

    ob_start();

    // The Query
    $the_query = new WP_Query($defaults);

    // The Loop
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            hybrid_get_content_template();
        }
        /* Restore original Post Data */
        wp_reset_postdata();
    } else {
        // no posts found
        locate_template(array('content/error.php'), true);
    }

    return ob_get_clean();
}

add_shortcode('wb_blog', 'wb_blog');
