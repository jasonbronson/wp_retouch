<!DOCTYPE html>
<html <?php language_attributes('html'); ?>>
<head <?php hybrid_attr('head'); ?>>
    <?php wp_head(); // Hook required for scripts, styles, and other <head> items. ?>
</head>
<body <?php hybrid_attr('body'); ?>>
    <?php locate_template(array('misc/google-analytics.php'), true); // Loads the misc/google-analytics.php template. ?>
    <?php locate_template(array('misc/pushy.php'), true); // Loads the misc/pushy.php template. ?>
    <?php locate_template(array('misc/loader.php'), true); // Loads the misc/loader.php template. ?>
    <?php locate_template(array('misc/totop.php'), true); // Loads the misc/totop.php template. ?>
    <div id="page" class="site">
    	<div id="container" class="site-inner">
            <div class="skip-link">
                <a href="#content" class="screen-reader-text">
                    <?php esc_html_e('Skip to content', 'hybrid-base'); ?>
                </a>
            </div>
            <!-- .skip-link -->
            <header <?php hybrid_attr('header'); ?>>
                <?php hybrid_get_menu('primary'); // Loads the menu/primary.php template. ?>
            </header>
            <!-- #header -->
