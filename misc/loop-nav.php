<?php if (is_singular('post') || is_singular('portfolio_project')) : // If viewing a single post page. ?>
	<?php the_post_navigation(array(
            'prev_text' => '<span class="screen-reader-text">'.__('Previous Post', 'twentyseventeen').'</span><span aria-hidden="true" class="nav-subtitle">'.__('Previous', 'twentyseventeen').'</span> <span class="nav-title">%title</span>',
            'next_text' => '<span class="screen-reader-text">'.__('Next Post', 'twentyseventeen').'</span><span aria-hidden="true" class="nav-subtitle">'.__('Next', 'twentyseventeen').'</span> <span class="nav-title">%title</span>',
        ));
    ?>
<?php elseif (is_home() || is_archive() || is_search()) : // If viewing the blog, an archive, or search results. ?>
	<?php the_posts_pagination(array(
            'prev_text' => esc_html_x('&laquo; Previous', 'posts navigation', 'hybrid-base'),
            'next_text' => esc_html_x('Next &raquo;',     'posts navigation', 'hybrid-base'),
        ));
    ?>
<?php endif; // End check for type of page being viewed. ?>
