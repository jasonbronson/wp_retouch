<div <?php hybrid_attr('posts', '', $atts); ?>>
    <?php if($defaults['col-xs'] || $defaults['col-sm'] || $defaults['col-md'] || $defaults['col-lg']): ?>
        <div class="row">
             <?php echo $query->wb_posts(); ?>
        </div>
    <?php else: ?>
        <?php echo $query->wb_posts(); ?>
    <?php endif; ?>
    <?php if($defaults['navigation'] == 'yes'): ?>
        <?php echo $query->post_navigation(); ?>
    <?php endif; ?>
</div>
