<div <?php hybrid_attr('counter', '', $atts); ?>>
    <?php if($defaults['text']): ?>
    <span class="text"><?php echo $defaults['text']; ?></span>
    <?php endif; ?>
    <?php if($defaults['label']): ?>
    <span class="label"><?php echo $defaults['label']; ?></span>
    <?php endif; ?>
</div>
