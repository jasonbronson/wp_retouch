<?php

add_action('init', 'wb_register_menus', 5);
add_action('widgets_init', 'wb_register_sidebars', 5);
add_action('hybrid_register_layouts', 'wb_register_layouts', 5);
add_action('customize_register', 'wb_customize_register', 11);
add_filter('hybrid_attr_menu', 'wb_attr_menu');
add_filter('hybrid_attr_body', 'wb_attr_body');
add_filter('hybrid_attr_sidebar', 'wb_attr_sidebar', 10, 2);
add_filter('get_search_form', 'modify_search_form');

function wb_register_menus()
{
    register_nav_menu('primary', __('Primary', 'wb'));
}

function wb_register_sidebars()
{
    hybrid_register_sidebar(
        array(
            'id' => 'primary',
            'name' => __('Primary', 'wb'),
            'description' => __('The main sidebar. It is displayed on either the left or right side of the page based on the chosen layout.', 'wb'),
        )
    );

    hybrid_register_sidebar(
        array(
            'id' => 'subsidiary',
            'name' => __('Subsidiary', 'wb'),
            'description' => __('The subsidiary sidebar. It is displayed on either the left or right side of the page based on the chosen layout.', 'wb'),
        )
    );

    hybrid_register_sidebar(
        array(
            'id' => 'pushy',
            'name' => __('Pushy', 'wb'),
            'description' => __('Pushy is a responsive off-canvas sidebar using CSS transforms & transitions.', 'wb'),
        )
    );

    hybrid_register_sidebar(
        array(
            'id' => 'contact',
            'name' => __('Contact', 'wb'),
            'description' => __('This sidebar is for contact page template.', 'wb'),
        )
    );

    hybrid_register_sidebar(
        array(
            'id' => 'footer',
            'name' => __('Footer', 'wb'),
            'description' => __('A sidebar located in the footer of the site. Optimized for one, two, or three widgets (and multiples thereof).', 'wb'),
        )
    );
}

function wb_customize_register($wp_customize)
{
    $wp_customize->get_setting('theme_layout')->transport = 'refresh';
}

function wb_register_layouts()
{
    hybrid_register_layout(
         '2c-l',
         array(
             'label' => _x('2 Columns: Sidebar / Content', 'theme layout', 'hybrid-core'),
             'is_global_layout' => true,
             'is_post_layout' => true,
             'image' => '%s/wb/images/2c-l.png', // Image URL. Doesn't do anything yet.
         )
     );

    hybrid_register_layout(
         '2c-r',
         array(
             'label' => _x('2 Columns: Sidebar / Content', 'theme layout', 'hybrid-core'),
             'image' => '%s/wb/images/2c-r.png', // Image URL. Doesn't do anything yet.
         )
     );

    hybrid_register_layout(
          '1c',
          array(
              'label' => _x('2 Columns: Sidebar / Content', 'theme layout', 'hybrid-core'),
              'image' => '%s/wb/images/1c.png', // Image URL. Doesn't do anything yet.
          )
    );

    hybrid_register_layout(
         '1c-narrow',
         array(
             'label' => _x('1 Column: Fluid', 'theme layout', 'hybrid-core'),
             'image' => '%s/wb/images/1c-narrow.png', // Image URL. Doesn't do anything yet.
         )
     );

    hybrid_register_layout(
          'wide',
          array(
              'label' => _x('Wide', 'theme layout', 'hybrid-core'),
              'is_global_layout' => false,
              'image' => '%s/wb/images/wide.png', // Image URL. Doesn't do anything yet.
              'post_types' => array('page'),
          )
      );
}

function wb_attr_menu($attr)
{
    $attr['class'] .= ' navbar navbar-static-top';

    return $attr;
}

function wb_attr_body($attr)
{
    if (true == apply_filters('wb_default_layout', get_theme_mod('wb_layout', false))) {
        $attr['class'] .= ' layout-boxed';
    }

    return $attr;
}

function wb_attr_sidebar($attr, $context)
{
    if ($context == 'footer') {
        $col = get_theme_mod('wb_footer_layout', 3);
        $attr['class'] .= " columns-{$col}";
    }

    return $attr;
}

function modify_search_form($form)
{
    $form = '<form role="search" method="get" class="search-form" action="'.home_url('/').'" >
        <fieldset class="form-group">
            <label class="screen-reader-text" for="s">'._x('Search for:', 'label').'</label>
            <input type="search" class="search-field" id="s" value="'.get_search_query().'" name="s" placeholder="'.esc_attr_x('Search …', 'placeholder').'">
        </fieldset>
        <input type="submit" class="search-submit" value="'.esc_attr_x('Search', 'submit button').'">
    </form>';

    return $form;
}
