<?php
/**
 * Adds WB_Widget_Recent_Posts widget.
 */
class WB_Widget_Recent_Posts extends WP_Widget
{
    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'widget_extended_recent_entries',
            'description' => __('Your site&#8217;s most recent Posts.'),
        );
        parent::__construct('extended_recent_entries', __('Extended Recent Posts'), $widget_ops);
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        if (!isset($args['widget_id'])) {
            $args['widget_id'] = $this->id;
        }

        $title = (!empty($instance['title'])) ? $instance['title'] : __('Recent Posts');
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);
        $number = (!empty($instance['number'])) ? absint($instance['number']) : 5;
        if (!$number) {
            $number = 5;
        }
        $show_date = isset($instance['show_date']) ? $instance['show_date'] : false;

        $r = new WP_Query(apply_filters('widget_posts_args', array(
            'posts_per_page' => $number,
            'no_found_rows' => true,
            'post_status' => 'publish',
            'ignore_sticky_posts' => true,
        )));

        if ($r->have_posts()) {
            echo $args['before_widget'];
            if ($title) {
                echo $args['before_title'].$title.$args['after_title'];
            }
            echo '<ul>';
            while ($r->have_posts()) {
                $r->the_post();
                echo '<li '.hybrid_get_attr( 'post' ).'>';
                if($post_thumbnail = get_the_image(array('echo' => false))) {
                    echo $post_thumbnail;
                } else {
                     hybrid_post_format_link();
                }
                echo '<h3 class="post-title"><a href="'.get_permalink().'">'.(get_the_title() ? get_the_title() : get_the_ID()).'</a></h3>';
                if ($show_date) {
                    echo '<span class="post-date">'.get_the_date().'</span>';
                }
                echo '</li>';
            }
            echo '</ul>';
            echo $args['after_widget'];
            wp_reset_postdata();
        }
    }
    /**
     * Handles updating the settings for the current Recent Posts widget instance.
     *
     * @since 2.8.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     *
     * @return array Updated settings to save.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = isset($new_instance['show_date']) ? (bool) $new_instance['show_date'] : false;

        return $instance;
    }
    /**
     * Outputs the settings form for the Recent Posts widget.
     *
     * @since 2.8.0
     *
     * @param array $instance Current settings.
     */
    public function form($instance)
    {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
        $show_date = isset($instance['show_date']) ? (bool) $instance['show_date'] : false;
        ?>
		<p><label for="<?php echo $this->get_field_id('title');
        ?>"><?php _e('Title:');
        ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title');
        ?>" name="<?php echo $this->get_field_name('title');
        ?>" type="text" value="<?php echo $title;
        ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number');
        ?>"><?php _e('Number of posts to show:');
        ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id('number');
        ?>" name="<?php echo $this->get_field_name('number');
        ?>" type="number" step="1" min="1" value="<?php echo $number;
        ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox"<?php checked($show_date);
        ?> id="<?php echo $this->get_field_id('show_date');
        ?>" name="<?php echo $this->get_field_name('show_date');
        ?>" />
		<label for="<?php echo $this->get_field_id('show_date');
        ?>"><?php _e('Display post date?');
        ?></label></p>
<?php

    }
}
