<section <?php hybrid_attr('block', '', $atts); ?>>
    <?php if($defaults['container'] == 'yes'): ?>
        <div class="container">
    <?php endif; ?>
        <?php if($defaults['title'] || $defaults['description']): ?>
            <div class="block_header">
                <?php if($defaults['title']): ?>
                    <h1 class="block_title"><?php echo $defaults['title']; ?></h1>
                <?php endif; ?>
                <?php if($defaults['description']): ?>
                    <p class="block_lead"><?php echo $defaults['description']; ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php echo do_shortcode($content); ?>
    <?php if($defaults['container'] == 'yes'): ?>
        </div>
    <?php endif; ?>
</section>
