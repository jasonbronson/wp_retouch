<div <?php hybrid_attr('icon-box', '', $atts); ?>>
    <div class="icon-box__icon">
        <?php printf('<i class="%s"></i>', $defaults['icon']); ?>
    </div>
    <div class="icon-box__detail">
        <?php printf('<h4 class="icon-box__title">%s</h4>', $defaults['title']) ?>
        <?php echo do_shortcode($content); ?>
    </div>
</div>
