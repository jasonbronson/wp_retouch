<?php

/**
 * Adds WB_Widget_Customizer widget.
 */
class WB_Widget_Customizer extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'customizer', // Base ID
            esc_html__('Customizer', 'text_domain'), // Name
            array('description' => esc_html__('Easy way to modify options from front-end.', 'text_domain')) // Args
        );
    }

    public function widget($args, $instance)
    {
        include locate_template('wb/inc/widget-customizer.php');
    }
}
