<?php

class WB_Isotope
{
    public function __construct()
    {
        add_shortcode('wb_isotope', array($this, 'isotope_shortcode'));
    }

    public function isotope_shortcode($atts)
    {
        $defaults = shortcode_atts(array(
            'id' => 'isotope',
            'xclass' => '',
            'post_type' => 'post',
            'posts_per_page' => 5,
            'col_lg' => 'col-lg-4',
            'col_md' => 'col-md-4',
            'col_sm' => 'col-sm-6',
            'col_xs' => 'col-xs-12',
            'markup' => true,
            'container' => true,
            'gutter' => true,
            'filter' => true,
            'navigation' => true,
        ), $atts);

        $query = new WB_Posts(array(
                'post_type' => $defaults['post_type'],
                'posts_per_page' => $defaults['posts_per_page'],
            ), array(
                'col_lg' => $defaults['col_lg'],
                'col_md' => $defaults['col_md'],
                'col_sm' => $defaults['col_sm'],
                'col_xs' => $defaults['col_xs'],
            )
        );

        $isotope = $this->make_isotope(array(
            'id' => $defaults['id'],
            'content' => $query->wb_posts(),
            'filter' => $defaults['filter'] ? $query->post_filter() : '',
            'navigation' => $defaults['navigation'] ? $query->post_navigation() : '',
            'markup' => $defaults['markup'],
            'xclass' => $defaults['xclass'],
            'container' => $defaults['container'],
            'gutter' => $defaults['gutter'],
        ));

        if ($query->have_posts()) {
            $isotope .= $this->isotope_js($defaults['id']);
        }

        return $isotope;
    }

    public function make_isotope($args)
    {
        $markup = '<div id="'.$args['id'].'" class="isotope">
            '.$args['filter'].'
            <div class="row">
                <div class="isotope__inner">
                    '.$args['content'].'
                </div>
            </div>
            '.$args['navigation'].'
        </div>';

        if ($args['markup']) {
            $markup = '<section class="block block_isotope '.($args['xclass'] ? ' '.$args['xclass'] : '').($args['gutter'] ? '' : ' no-gutter').'">
                '.($args['container'] ? '<div class="container">' : '').'
                    <div class="block__inner">
                        '.$markup.'
                    </div>
                '.($atts['container'] ? '</div>' : '').'
            </section>';
        }

        return $markup;
    }

    public function isotope_js($id)
    {
        return '<script type="text/javascript">
            (function($) {
                $(window).load(function() {
                    var $isotope = $("#'.$id.' .isotope__inner").isotope();
                    $("#'.$id.' .isotope__filter").on("click", ".nav-link", function(event) {
                        event.preventDefault();
                        var filterValue = $(this).attr("data-filter");
                        $isotope.isotope({
                            filter: filterValue
                        });
                        $("#'.$id.' .isotope__filter").find(".active").removeClass("active");
                        $(this).parent().addClass("active");s
                    });
                });
            })(jQuery);
        </script>';
    }
}

$wb_isotope = new WB_Isotope();
