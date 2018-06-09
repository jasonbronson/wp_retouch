<?php

add_filter('hybrid_attr_comment-body', 'hybrid_attr_comment_body', 5);
add_filter('hybrid_site_title', 'wb_site_title', 5, 2);
add_filter('hybrid_site_description', 'wb_site_description', 5, 2);

add_action( 'wb_content_before', 'wb_content_wrap_open',  999 );
add_action( 'wb_content_after', 'wb_content_wrap_close',  999 );
add_action( 'wb_sidebar_after', 'wb_sidebar_wrap_close',  999 );

function wb_content_wrap_open() {
    if (in_array(hybrid_get_theme_layout(), array('default', '2c-l', '2c-r', '1c', '1c-narrow'))) {
        printf( '<div %s>', hybrid_get_attr('container') );
        printf( '<div %s>', hybrid_get_attr('row') );
    }

    if (in_array(hybrid_get_theme_layout(), array('default', '2c-l'))) {
        printf( '<div %s>', hybrid_get_attr('col-md-8') );
    }

    if (in_array(hybrid_get_theme_layout(), array('2c-r'))) {
        printf( '<div %s>', hybrid_get_attr('col-md-8 col-md-push-4') );
    }

    if (in_array(hybrid_get_theme_layout(), array('1c'))) {
        printf( '<div %s>', hybrid_get_attr('col-md-12') );
    }

    if (in_array(hybrid_get_theme_layout(), array('1c-narrow'))) {
        printf( '<div %s>', hybrid_get_attr('col-md-8 col-md-offset-2') );
    }
}

function wb_content_wrap_close() {
    if (in_array(hybrid_get_theme_layout(), array('default', '2c-l', '2c-r', '1c', '1c-narrow'))) {
        echo '</div>';
    }

    if (in_array(hybrid_get_theme_layout(), array('default', '2c-l'))) {
        echo '<div class="col-md-4">';
    }

    if (in_array(hybrid_get_theme_layout(), array('2c-r'))) {
        echo '<div class="col-md-4 col-md-pull-8">';
    }
}

function wb_sidebar_wrap_close() {
    if (in_array(hybrid_get_theme_layout(), array('default', '2c-l', '2c-r'))) {
        echo '</div>';
    }
    if (in_array(hybrid_get_theme_layout(), array('default', '2c-l', '2c-r', '1c', '1c-narrow'))) {
        echo '</div>';
        echo '</div>';
    }
}

function hybrid_attr_comment_body($attr)
{
    $attr['id'] = 'div-comment-'.get_comment_ID();
    $attr['class'] = 'comment-body';

    return $attr;
}

function wb_site_title()
{
    if ( $title = get_bloginfo( 'name' ) ) {
        $title = sprintf( '<a %s href="%s" rel="home">%s</a>', hybrid_get_attr( 'navbar-brand' ), esc_url( home_url() ), $title );
    }

    return $title;
}

function wb_site_description() {

	if ( $desc = get_bloginfo( 'description' ) ) {
        $desc = sprintf( '<p %s>%s</p>', hybrid_get_attr( 'site-description navbar-text' ), $desc );
    }

	return $desc;
}
