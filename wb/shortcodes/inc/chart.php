<div class="chart-item">
    <div <?php hybrid_attr('chart', '', $atts); ?>>
        <span class="percent"></span>
    </div>
    <?php if($content || $defaults['label']): ?>
        <div <?php hybrid_attr('chart-content'); ?>>
            <?php if($defaults['label']): ?>
                <h2 class="chart-label"><?php echo $defaults['label']; ?></h2>
            <?php endif; ?>
            <?php echo do_shortcode($content); ?>
        </div>
    <?php endif; ?>
</div>
