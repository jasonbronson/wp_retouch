<?php

// register widgets
function register_wb_widgets()
{
    register_widget('WB_Widget_Recent_Posts');
    register_widget('WB_Widget_Customizer');
}
add_action('widgets_init', 'register_wb_widgets');
