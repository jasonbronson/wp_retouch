<article <?php hybrid_attr('post'); ?>>
    <div class="entry-inner">
        <?php $post_thumbnail = get_the_image(array('size' => 'full', 'order' => array('featured', 'attachment'), 'link' => false, 'format' => 'array')); ?>
        <?php if(hybrid_get_content_url(get_the_content())): ?>
            <?php printf('<a href="%s"><img src="%s" alt="%s" /></a>', hybrid_get_content_url(get_the_content()), $post_thumbnail['src'], $post_thumbnail['alt']); ?>
        <?php else: ?>
            <?php printf('<img src="%s" alt="%s" />', $post_thumbnail['src'], $post_thumbnail['alt']); ?>
        <?php endif; ?>
    </div>
</article>
