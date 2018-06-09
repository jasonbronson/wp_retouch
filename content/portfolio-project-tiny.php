<article <?php hybrid_attr('post'); ?>>
    <?php switch (get_post_format()): case 'gallery': ?>
        <?php $entry_gallery = wobootstrap_get_gallery(array('split_gallery' => true, 'format' => 'array')); ?>
        <?php if ($entry_gallery): ?>
            <?php $ids = explode(',', $entry_gallery['ids']); ?>
            <?php $lightbox = ''; ?>
            <?php $post_thumbnail = ''; ?>
            <?php $i = 0; ?>
            <?php foreach ($ids as $id): ?>
                <?php $attachment = get_post($id); ?>
                <?php $thumbnail = wp_get_attachment_image_src($id, 'small-4by3'); ?>
                <?php $thumbnail_full = wp_get_attachment_image_src($id, 'full'); ?>

                <?php if ($i == 0) : ?>
                    <?php $post_thumbnail .= sprintf('<img src="%s" alt="%s" />', $thumbnail[0], trim(strip_tags(get_post_meta($id, '_wp_attachment_image_alt', true)))); ?>
                    <?php $lightbox .= sprintf('<a href="%s" class="btn fadeInLeft" title="%s"><span class="genericons-neue genericons-neue-gallery"></span></a>', $thumbnail_full[0], $attachment->post_excerpt); ?>
                <?php else : ?>
                    <?php $lightbox .= sprintf('<a href="%s" class="sr-only" title="%s"></a>', $thumbnail_full[0], $attachment->post_excerpt); ?>
                <?php endif; ?>

                <?php ++$i; ?>
            <?php endforeach; ?>
            <div <?php hybrid_attr('entry-media'); ?>>
                <div class="entry-media__inner has-zoom has-overlay has-action-buttons">
                    <div class="entry-thumbnail">
                        <?php echo $post_thumbnail; ?>
                    </div>
                    <div class="action-buttons action-buttons_center-center">
                        <span class="lightbox-gallery">
                            <?php echo $lightbox; ?>
                        </span>
                        <?php printf('<a href="%s" class="btn animated fadeInRight"><i class="genericons-neue genericons-neue-link"></i></a>', get_permalink()); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
		<?php break; ?>
	<?php case 'video': ?>
        <?php $entry_thumbnail = get_the_image(array('size' => 'full', 'order' => array('featured'), 'format' => 'array')); ?>
        <?php $entry_video = new Hybrid_Media_Grabber(array('type' => 'video', 'split_media' => true)); ?>
        <?php if ($entry_thumbnail && $entry_video->original_media): ?>
            <?php $attachment_id = attachment_url_to_postid($entry_thumbnail['src']); ?>
            <?php $attachment = get_post($attachment_id); ?>
            <?php $entry_thumbnail = get_the_image(array('size' => 'small-4by3', 'order' => array('featured'), 'format' => 'array')); ?>

            <div <?php hybrid_attr('entry-media'); ?>>
                <div class="entry-media__inner has-zoom has-overlay has-action-buttons">
                    <div class="entry-thumbnail">
                        <?php printf('<img src="%s" class="%s" alt="%s" itemprop="%s" />', $entry_thumbnail['src'], $entry_thumbnail['class'], $entry_thumbnail['alt'], $entry_thumbnail['itemprop']); ?>
                    </div>
                    <div class="action-buttons action-buttons_center-center">
                        <?php printf('<a class="popup-video btn animated fadeInLeft" href="%s"><i class="genericons-neue genericons-neue-video"></i></a>', $entry_video->original_media); ?>
                        <?php printf('<a href="%s" class="btn animated fadeInRight"><i class="genericons-neue genericons-neue-link"></i></a>', get_permalink()); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
		<?php break; ?>
	<?php default: ?>
        <?php $entry_thumbnail = get_the_image(array('size' => 'full', 'order' => array('featured'), 'format' => 'array')); ?>
        <?php if ($entry_thumbnail): ?>
            <?php $attachment_id = attachment_url_to_postid($entry_thumbnail['src']); ?>
            <?php $attachment = get_post($attachment_id); ?>
            <?php $thumbnail = get_the_image(array('size' => 'small-4by3', 'order' => array('featured'), 'format' => 'array')); ?>

            <div <?php hybrid_attr('entry-media'); ?>>
                <div class="entry-media__inner has-zoom has-overlay has-action-buttons">
                    <div class="entry-thumbnail">
                        <?php printf('<img src="%s" class="%s" alt="%s" itemprop="%s" />', $thumbnail['src'], $thumbnail['class'], $thumbnail['alt'], $thumbnail['itemprop']); ?>
                    </div>
                    <div class="action-buttons action-buttons_center-center">
                        <?php printf('<a class="magnific-popup-image btn fadeInLeft" href="%s" title="%s"><span class="genericons-neue genericons-neue-plus"></span></a>', $entry_thumbnail['src'], $attachment->post_excerpt); ?>
                        <?php printf('<a href="%s" class="btn animated fadeInRight"><i class="genericons-neue genericons-neue-link"></i></a>', get_permalink()); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
	<?php endswitch ?>
    <div class="entry-inner">
        <?php if (empty($entry_thumbnail) && empty($entry_gallery)): ?>
            <div <?php hybrid_attr('entry-summary'); ?>>
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
        <?php endif; ?>
        <footer class="entry-footer">
            <?php the_title('<h2 '.hybrid_get_attr('entry-title').'><a href="'.get_permalink().'" rel="bookmark" itemprop="url">', '</a></h2>'); ?>
            <div class="entry-byline">
                <?php hybrid_post_terms(array('taxonomy' => 'portfolio_category')); ?>
            </div><!-- .entry-byline -->
        </footer><!-- .entry-footer -->
    </div>
</article><!-- .entry -->
