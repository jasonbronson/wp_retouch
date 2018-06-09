<!-- pushy off-canvas sidebar -->
<aside <?php hybrid_attr('pushy pushy-right'); ?>>
    <?php if (is_active_sidebar('pushy')) : // If the sidebar has widgets. ?>

        <?php dynamic_sidebar('pushy'); // Displays the primary sidebar. ?>

    <?php else : // If the sidebar has no widgets. ?>

        <?php the_widget(
            'WP_Widget_Text',
            array(
                'title' => __('Example Widget', 'hybrid-base'),
                /* Translators: The %s are placeholders for HTML, so the order can't be changed. */
                'text' => sprintf(__('This is an example widget to show how the Pushy sidebar looks by default. You can add custom widgets from the %swidgets screen%s in the admin.', 'hybrid-base'), current_user_can('edit_theme_options') ? '<a href="'.admin_url('widgets.php').'">' : '', current_user_can('edit_theme_options') ? '</a>' : ''),
                'filter' => true,
            ),
            array(
                'before_widget' => '<section class="widget widget_text">',
                'after_widget' => '</section>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>',
            )
        ); ?>

    <?php endif; // End widgets check. ?>
</aside>
<!-- site overlay -->
<div class="site-overlay"></div>
