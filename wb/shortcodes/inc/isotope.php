<div <?php hybrid_attr('isotope', '', $atts); ?>>
    <?php if($defaults['post_filter'] == 'yes'): ?>
        <?php if($defaults['nav_container'] == 'yes'): ?>
        <div class="container">
        <?php endif; ?>
        <?php echo $query->post_filter(); ?>
        <?php if($defaults['nav_container'] == 'yes'): ?>
        </div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="isotope__inner clearfix">
        <?php echo $query->wb_posts(); ?>
    </div>
    <?php if($defaults['post_navigation'] == 'yes'): ?>
        <?php if($defaults['nav_container'] == 'yes'): ?>
        <div class="container">
        <?php endif; ?>
        <?php echo $query->post_navigation(); ?>
        <?php if($defaults['nav_container'] == 'yes'): ?>
        </div>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php if($query->have_posts()): ?>
    <script type="text/javascript">
        (function($) {
            $(window).load(function() {
                var $isotope = $('#<?php echo $defaults['id']; ?> .isotope__inner').isotope();
                $('#<?php echo $defaults['id']; ?> .nav-links').on('click', '.nav-link', function(event) {
                    event.preventDefault();
                    var filterValue = $(this).attr('data-filter');
                    $isotope.isotope({
                        filter: filterValue
                    });
                    $('#<?php echo $defaults['id']; ?> .nav-links').find('.nav-link').removeClass('current');
                    $(this).addClass('current');
                });
            });
        })(jQuery);
    </script>
<?php endif; ?>
