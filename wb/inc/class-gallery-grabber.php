<?php

/**
 * WoBootstrap Get Gallery - A script for pulling gallery related to a post.
 *
 * WoBootstrap Get Gallery is a script for pulling gallery from the post content.
 * This script was written so that theme developers could pull that
 * gallery and use it in interesting ways within their themes. For example, a theme could get a gallery
 * and display it on archive pages alongside the post excerpt or pull it out of the content to display
 * it above the post on single post views.
 *
 * @author     Mithun Biswas <bhoot.biswas@gmail.com>
 * @copyright  Copyright (c) 2015, Mithun Biswas
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Wrapper function for the WoBootstrap_Get_Gallery class.  Returns the HTML output for the found gallery.
 *
 * @since  1.0.0
 *
 * @param  array
 *
 * @return string
 */
function wobootstrap_get_gallery($args = array())
{
    $gallery = new WoBootstrap_Get_Gallery($args);

    return $gallery->get_gallery();
}

/**
 * Grabs gallery related to the post.
 *
 * @since  1.0.0
 */
class WoBootstrap_Get_Gallery
{
    /**
     * The HTML version of the gallery to return.
     *
     * @since  1.0.0
     *
     * @var string
     */
    public $gallery = '';

    /**
     * The array of post gallery.
     *
     * @since  1.0.0
     *
     * @var array
     */
    public $gallery_array = '';

    /**
     * The original gallery taken from the post content.
     *
     * @since  1.0.0
     *
     * @var string
     */
    public $original_gallery = '';

    /**
     * Arguments passed into the class and parsed with the defaults.
     *
     * @since  1.0.0
     *
     * @var array
     */
    public $args = array();

    /**
     * The content to search for embedded gallery within.
     *
     * @since  1.0.0
     *
     * @var string
     */
    public $content = '';

    /**
     * Constructor method.  This sets up and runs the show.
     *
     * @since  1.0.0
     */
    public function __construct($args = array())
    {
        // Set up the default arguments.
        $defaults = array(
            'post_id' => get_the_ID(),     // post ID (assumes within The Loop by default)
            'before' => '',               // HTML before the output
            'after' => '',               // HTML after the output
            'split_gallery' => false,          // Splits the gallery from the post content
            'show_indicators' => false,
            'show_controls' => true,
            'format' => 'gallery',
        );

        /* Set the object properties. */
        $this->args = apply_filters('wobootstrap_get_gallery_args', wp_parse_args($args, $defaults));
        $this->content = get_post_field('post_content', $this->args['post_id'], 'raw');

        /* Find the gallery related to the post. */
        $this->set_gallery();
    }

    /**
     * Destructor method.  Removes filters we needed to add.
     *
     * @since  1.6.0
     */
    public function __destruct()
    {
        remove_filter('the_content', array($this, 'split_gallery'), 5);
    }

    /**
     * Basic method for returning the gallery found.
     *
     * @since  1.0.0
     *
     * @return string
     */
    public function get_gallery()
    {
        if ($this->args['format'] == 'array') {
            return $this->gallery_array = get_post_gallery(get_the_ID(), false);
        } else {
            return apply_filters('wobootstrap_gallery_shortcode', $this->gallery);
        }
    }

    /**
     * Tries to find gallery related to the post.  Returns the found gallery.
     *
     * @since  1.0.0
     */
    public function set_gallery()
    {
        /* Find gallery in the post content based on WordPress' gallery-related shortcodes. */
        if (empty($this->gallery)) {
            $this->find_gallery_shortcode();
        }

        /* If gallery is found, let's run a few things. */
        if ($this->gallery) {
            /* Split the gallery from the content. */
            // Split the gallery from the content.
            if (true === $this->args['split_gallery'] && !empty($this->original_gallery)) {
                add_filter('the_content', array($this, 'split_gallery'), 5);
            }

            // Filter the before/after HTML.
            $this->gallery = $this->args['before'].$this->gallery.$this->args['after'];
        }
    }

    /**
     * This method figures out the gallery shortcode used in the content.  Once it's found, the appropriate method for
     * the shortcode is executed.
     *
     * @since  1.0.0
     */
    public function find_gallery_shortcode()
    {

        /* Finds matches for shortcodes in the content. */
        preg_match_all('/'.get_shortcode_regex().'/s', $this->content, $matches, PREG_SET_ORDER);

        /* If matches are found, loop through them and check if they match one of WP's gallery shortcodes. */
        if (!empty($matches)) {
            foreach ($matches as $shortcode) {

                /* Call the method related to the specific shortcode found and break out of the loop. */
                if (in_array($shortcode[ 2 ], array('gallery'))) {
                    call_user_func(array($this, 'do_gallery_shortcode'), $shortcode);
                    break;
                }
            }
        }
    }

    /**
     * Handles the HTML when the [gallery] shortcode is used.
     *
     * @since  1.0.0
     */
    public function do_gallery_shortcode($shortcode)
    {
        $this->original_gallery = array_shift($shortcode);
        $gallery_images = get_post_gallery(get_the_ID(), false);
        $ids = explode(',', $gallery_images['ids']);

        if ($this->args['show_indicators']) {
            $indicators_markup = '';

            for ($i = 0; $i < count($gallery_images[ 'src' ]); ++$i) {
                $indicators_markup .= '<li data-target="#carousel-'.get_the_ID().'-generic" data-slide-to="'.$i.'"'.($i == 0 ? ' class="active"' : '').'><a href="#"></a></li>';
            }

            $indicators = '<div class="dotstyle dotstyle-fillin">
                <ul class="carousel-indicators">
                    '.$indicators_markup.'
                </ul>
            </div>';
        } else {
            $indicators = '';
        }

        if ($this->args['show_controls']) {
            $controls = '<a class="left carousel-control" href="#carousel-'.get_the_ID().'" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-'.get_the_ID().'" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>';
        } else {
            $controls = '';
        }

        $slides = '';

        $i = 0;
        foreach ($ids as $id) {
            $attachment = get_post($id);

            $lightbox = wp_get_attachment_image_src($id, 'full');

            if(is_singular( 'portfolio_project')) {
                $thumbnail = wp_get_attachment_image_src($id, 'large-18by9');
            } else {
                $thumbnail = wp_get_attachment_image_src($id, 'large-16by9');
            }

            $item_class = ($i == 0) ? ' active' : '';

            $slides .= sprintf(
                '<div class="item%s has-action-buttons has-overlay">
                    <img src="%s" alt="%s">
                    <div class="action-buttons action-buttons_top-right">
                        <a class="magnific-popup-gallery btn animated fadeIn" href="%s" title="%s"><span class="genericons-neue genericons-neue-fullscreen"></span></a>
                    </div>
                </div>',
                $item_class,
                $thumbnail[0],
                $attachment->post_title,
                $lightbox[0],
                $attachment->post_excerpt
            );

            ++$i;
        }

        $carousel = sprintf(
            '<div id="carousel-%s" class="carousel slide" data-ride="carousel">%s<div class="carousel-inner lightbox-gallery" role="listbox">%s</div>%s</div>',
            get_the_ID(),
            $indicators,
            $slides,
            $controls
        );

        $this->gallery = $carousel;
    }

    /**
     * Removes the found gallery from the content.  The purpose of this is so that themes can retrieve the
     * gallery from the content and display it elsewhere on the page based on its design.
     *
     * @since  1.0.0
     *
     * @param string $content
     *
     * @return string
     */
    public function split_gallery($content)
    {
        return get_the_ID() === $this->args['post_id'] ? str_replace($this->original_gallery, '', $content) : $content;
    }
}
