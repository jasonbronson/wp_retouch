<?php

add_action('wp_head', 'wb_header_js', 100);
add_action('wp_footer', 'wb_footer_js', 100);
add_action('wb_before_footer', 'echo_comment_id', 10, 1);

if ( is_active_widget( false, false, 'customizer', true ) ) {
    add_action('init', 'wb_cookie');
    add_filter( 'wb_default_color', 'wb_default_colors' );
    add_filter( 'wb_default_layout', 'wb_default_layouts');
}

function wb_cookie()
{
    if (!empty($_POST['color']) && preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $_POST['color'])) {
        setcookie('color', $_POST['color'], time() + 3600);
    }

    if (!empty($_POST['layout'])) {
        setcookie('layout', $_POST['layout'], time() + 3600);
    }
}

function wb_default_colors()
{
    if (!empty($_POST['color']) && preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $_POST['color'])) {
        $color = $_POST['color'];
    } elseif (!empty($_COOKIE['color'])) {
        $color = $_COOKIE['color'];
    } else {
        $color = get_theme_mod('wb_secondary_color', 'default_value');
    }

    return $color;
}

function wb_default_layouts()
{
    if (!empty($_POST['layout'])) {
        if($_POST['layout'] == 'boxed') {
            $boxed = true;
        } else {
            $boxed = false;
        }
    } elseif (!empty($_COOKIE['layout'])) {
        if($_COOKIE['layout'] == 'boxed') {
            $boxed = true;
        } else {
            $boxed = false;
        }
    } else {
        $boxed = get_theme_mod('wb_layout', false);
    }

    return $boxed;
}

function wb_header_js()
{
    ob_start();
    include locate_template('wb/inc/header-js.php');
    echo ob_get_clean();
}

function wb_footer_js()
{
    ob_start();
    include locate_template('wb/inc/footer-js.php');

    echo ob_get_clean();
}

function echo_comment_id($comment_id)
{
    if (is_singular('portfolio_project')) {
        echo '<div class="block">';
        echo '<div class="container">';
        echo '<h5 class="mb-computed text-uppercase">More Projects</h5>';
        echo do_shortcode('[wb_carousel items="4" gutter="15" post_type="portfolio_project" post_template="tiny" exclude_ids="'.get_the_ID().'" col-md="3" post_style="minimal" posts_per_page="10"]');
        echo '</div>';
        echo '</div>';
    }
}

add_filter('wpcw_widget_contact_custom_fields', function ($fields, $instance) {

  $fields['text'] = [
    'label' => __('Text', 'YOURTEXTDOMAIN'),
    'type' => 'textarea',
    'form_callback' => 'render_form_textarea',
    'description' => __('A cellphone number that website vistors can call if they have questions.', 'YOURTEXTDOMAIN'),
  ];

  return $fields;

}, 10, 2);
