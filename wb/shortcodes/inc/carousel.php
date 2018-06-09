<div <?php hybrid_attr('owl-carousel', '', $atts); ?>>
    <?php echo $query->wb_posts(); ?>
</div>
<script type="text/javascript">
(function($) {
    $(document).ready(function() {
        $("#CAROUSEL_ID").owlCarousel({
            responsiveClass: CAROUSEL_RESPONSIVE_CLASS,
            dots: CAROUSEL_DOTS,
            nav: CAROUSEL_NAV,
            margin: CAROUSEL_MARGIN,
            responsive: {
                0: {
                    items: CAROUSEL_ITEMS_XS,
                },
                768: {
                    items: CAROUSEL_ITEMS_SM,
                },
                992: {
                    items: CAROUSEL_ITEMS_LG,
                }
            }
        });
    });
})(jQuery);
</script>
