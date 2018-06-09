<?php

if (!class_exists('WoBootstrap')) {
    class WoBootstrap
    {
        public function __construct()
        {
            // Set up the load order.
            add_action('after_setup_theme', array($this, 'constants'), -94);
            add_action('after_setup_theme', array($this, 'core'), -94);
            add_action('after_setup_theme', array($this, 'shortcodes'), 12);
            add_action('after_setup_theme', array($this, 'customizer'), 12);
            add_action('after_setup_theme', array($this, 'metabox'), 12);
        }

        public function constants()
        {
            // Sets the framework version number.
            define('WB_VERSION', '3.0.0');

            // Sets the path to the core framework directory.
            if (!defined('WB_DIR')) {
                define('WB_DIR', trailingslashit(HYBRID_PARENT.basename(dirname(__FILE__))));
            }

            // Sets the path to the core framework directory URI.
            if (!defined('WB_URI')) {
                define('WB_URI', trailingslashit(HYBRID_PARENT_URI.basename(dirname(__FILE__))));
            }

            // Core framework directory paths.
            define('WB_INC', trailingslashit(WB_DIR.'inc'));
            define('WB_SHORTCODES', trailingslashit(WB_DIR.'shortcodes'));
            define('WB_CUSTOMIZER', trailingslashit(WB_DIR.'customize'));
            define('WB_BUTTERBEAN', trailingslashit(WB_DIR.'butterbean'));

            // Core framework directory URIs.
            define('WB_CSS', trailingslashit(WB_URI.'css'));
            define('WB_JS',  trailingslashit(WB_URI.'js'));
        }

        public function core()
        {
            // Load the class files.
            require_once WB_INC.'class-navwalker.php';
            require_once WB_INC.'class-gallery-grabber.php';
            require_once WB_INC.'class-cpt.php';
            require_once WB_INC.'class-portfolio.php';
            require_once WB_INC.'class-isotope.php';
            require_once WB_INC.'class-posts.php';
            require_once WB_INC.'class-team.php';
            require_once WB_INC.'class-client.php';
            require_once WB_INC.'class-testimonial.php';
            require_once WB_INC.'class-plan.php';
            require_once WB_INC.'class-recent-posts.php';
            require_once WB_INC.'class-customizer.php';

            // Load the functions files.
            require_once WB_INC.'functions-scripts.php';
            require_once WB_INC.'functions-styles.php';
            require_once WB_INC.'functions-actions.php';
            require_once WB_INC.'functions-attr.php';
            require_once WB_INC.'func.php';

            // Load the template files.

            // Load other files
            require_once WB_INC.'func-media.php';
            require_once WB_INC.'custom-header.php';
            require_once WB_INC.'custom-background.php';
            require_once WB_INC.'custom-logo.php';
            require_once WB_INC.'inc.php';
            require_once WB_INC.'butterbean.php';
            require_once WB_INC.'plugin-activation.php';
            require_once WB_INC.'widgets.php';
        }

        public function shortcodes()
        {
            require_once WB_SHORTCODES.'icon-box.php';
            require_once WB_SHORTCODES.'carousel.php';
            require_once WB_SHORTCODES.'isotope.php';
            require_once WB_SHORTCODES.'posts.php';
            require_once WB_SHORTCODES.'pricing.php';
            require_once WB_SHORTCODES.'block.php';
            require_once WB_SHORTCODES.'blog.php';
            require_once WB_SHORTCODES.'call.php';
            require_once WB_SHORTCODES.'section.php';
            require_once WB_SHORTCODES.'counter.php';
            require_once WB_SHORTCODES.'chart.php';
        }

        public function customizer()
        {
            // If Kirki doesn't exists then there's no reason to procedd
            if (!class_exists('Kirki')) {
                return;
            }

            // Load configuration
            require_once WB_CUSTOMIZER.'kirki-config.php';

            // Load the panels
            require_once WB_CUSTOMIZER.'panel-general.php';
            require_once WB_CUSTOMIZER.'panel-identity.php';
            require_once WB_CUSTOMIZER.'panel-footer.php';
            require_once WB_CUSTOMIZER.'panel-layout.php';
            require_once WB_CUSTOMIZER.'panel-map.php';
            require_once WB_CUSTOMIZER.'panel-header.php';

            // Load the sections
            require_once WB_CUSTOMIZER.'section-loader.php';
            require_once WB_CUSTOMIZER.'section-totop.php';
            require_once WB_CUSTOMIZER.'section-color.php';
        }

        public function metabox()
        {
            require_once WB_BUTTERBEAN.'butterbean.php';
        }
    }
}
