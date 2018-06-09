<nav <?php hybrid_attr('menu', 'primary'); ?>>
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div <?php hybrid_attr( 'branding' ); ?>>
                <?php $custom_logo_id = get_theme_mod('custom_logo'); ?>
                <?php if ($custom_logo_id && !display_header_text()) : // If user chooses to display header text. ?>
                    <?php
                        echo sprintf('<a href="%1$s" class="custom-logo-link navbar-brand" rel="home" itemprop="url">%2$s</a>',
                            esc_url(home_url('/')),
                            wp_get_attachment_image($custom_logo_id, 'full', false, array(
                                'class' => 'custom-logo',
                                'itemprop' => 'logo',
                            ))
                        );
                    ?>
    			<?php else: ?>
                    <?php hybrid_site_title(); ?>
                    <?php hybrid_site_description(); ?>
                <?php endif; // End check for header text. ?>
            </div><!-- #branding -->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <?php locate_template(array('misc/navbar-search.php'), true); // Loads the misc/navbar-search.php template. ?>
            <button type="button" class="btn navbar-right navbar-btn btn-link menu-btn"><i class="genericons-neue genericons-neue-ellipsis"></i></button>
            <button type="button" class="btn navbar-right navbar-btn btn-link search-btn"><i class="genericons-neue genericons-neue-search" aria-hidden="true"></i></button>
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu' => 'primary',
                    'container' => false,
                    'container_class' => '',
                    'menu_class' => 'nav navbar-nav navbar-right',
                    'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                    'walker' => new wp_bootstrap_navwalker(),
                ));
            ?>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->
