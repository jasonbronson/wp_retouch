<?php

class WB_Posts
{
    public $args = array();
    public $query_args = array();
    public $query = null;

    public function __construct($args = array())
    {
        $default_args = array(
            'post_template' => '',
            'post_class' => '',
            'post_style' => '',
        );

        $this->args = wp_parse_args($args, $default_args);

        $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
        $query_args = array('paged' => $paged);
        if ($args['post_type']) {
            $query_args['post_type'] = $args['post_type'];
        }
        if ($args['posts_per_page']) {
            $query_args['posts_per_page'] = $args['posts_per_page'];
        }

        if (!empty($args['exclude_ids'])) {
            $query_args['post__not_in'] = explode( ',', $args['exclude_ids'] );
        }

        $this->query_args = $query_args;
        $this->query = new WP_Query($this->query_args);

        add_filter('hybrid_content_template_hierarchy', array($this, 'content_template_hierarchy'), 5);
        add_filter('hybrid_attr_post', array($this, 'post_attr'), 5);
    }

    public function __destruct()
    {
    }

    public function content_template_hierarchy($templates)
    {
        if (($this->args['post_type'] == 'post') && ($this->args['post_template'] == 'tiny')) {
            $templates = array();
            $templates[] = 'content/post-tiny.php';
        }

        if (($this->args['post_type'] == 'portfolio_project') && ($this->args['post_template'] == 'tiny')) {
            $templates = array();
            $templates[] = 'content/portfolio-project-tiny.php';
        }

        if (($this->args['post_type'] == 'post') && ($this->args['post_template'] == 'tiny')) {
            $templates = array();
            $templates[] = 'content/post-tiny.php';
        }

        if (($this->args['post_type'] == 'testimonial') && ($this->args['post_template'] == 'alt')) {
            $templates = array();
            $templates[] = 'content/testimonial-alt.php';
        }

        return $templates;
    }

    public function post_attr($attr)
    {
        $post_attr = array();

        array_push($post_attr, $this->args['post_template']);

        if (!empty($this->args['col-lg'])) {
            array_push($post_attr, 'col-lg-'.$this->args['col-lg']);
        }
        if (!empty($this->args['col-md'])) {
            array_push($post_attr, 'col-md-'.$this->args['col-md']);
        }
        if (!empty($this->args['col-sm'])) {
            array_push($post_attr, 'col-sm-'.$this->args['col-sm']);
        }
        if (!empty($this->args['col-xs'])) {
            array_push($post_attr, 'col-xs-'.$this->args['col-xs']);
        }
        if (get_post_meta(get_the_ID(), '_wb_plan_recommended', true)) {
            array_push($post_attr, 'recommended');
        }

        if ($this->args['post_class']) {
            array_push($post_attr, $this->args['post_class']);
        }

        if ($this->args['post_style']) {
            array_push($post_attr, $this->args['post_style']);
        }

        $attr['class'] .= ' '.implode(' ', $post_attr);

        return $attr;
    }

    public function post_filter()
    {
        $the_query = $this->query;

        if ($this->query_args['post_type'] == 'portfolio_project') {
            $taxonomy = 'portfolio_category';
        } else {
            $taxonomy = 'category';
        }

        $terms = get_terms($taxonomy);

        $term_ids = array();

        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();
                $post_terms = get_the_terms(get_the_ID(), $taxonomy);
                if ($post_terms) {
                    foreach ($post_terms as $term) {
                        if (!in_array($term->term_id, $term_ids)) {
                            $term_ids[] = $term->term_id;
                        }
                    }
                }
            }
            wp_reset_postdata();
        }

        if (!empty($terms)) {
            $links = '<a href="#" class="nav-link current" data-filter="*">All</a>' . "\n";

            foreach ($terms as $term) {
                if (in_array($term->term_id, $term_ids)) {
                    $links .= '<a href="#" class="nav-link" data-filter=".'.$taxonomy.'-'.$term->slug.'">'.$term->name.'</a>' . "\n";
                }
            }

            $navigation = _navigation_markup($links, 'posts-filter', __('Posts filter'));
        } else {
            $navigation = '';
        }

        return $navigation;
    }
    public function post_navigation()
    {
        $the_query = $this->query;
        $big = 999999999;

        $navigation = '';

        $links = paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $the_query->max_num_pages,
        ));

        if ($links) {
            $navigation = _navigation_markup($links, 'posts-pagination', __('Posts pagination'));
        } else {
            $navigation = '';
        }

        return $navigation;
    }

    public function wb_posts()
    {
        $the_query = $this->query;

        ob_start();

        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();
                hybrid_get_content_template();
            }
            wp_reset_postdata();
            remove_filter('hybrid_attr_post', array($this, 'post_attr'), 5);
            remove_filter('hybrid_content_template_hierarchy', array($this, 'content_template_hierarchy'), 5);
        } else {
            locate_template(array('content/error.php'), true);
        }

        return ob_get_clean();
    }

    public function have_posts()
    {
        $the_query = $this->query;

        if ($the_query->have_posts()) {
            return true;
        } else {
            return false;
        }
    }
}
