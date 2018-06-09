<?php
    $entry_video = new Hybrid_Media_Grabber( array('type' => 'video', 'split_media' => true));
    $entry_gallery = wobootstrap_get_gallery(array('split_gallery' => true, 'format' => 'array'));
    $entry_thumbnail = get_the_image(array('size' => 'full', 'order' => array('featured'), 'format' => 'array'));

    if(!$entry_video && !$entry_gallery && !$entry_thumbnail) {
        return;
    }
?>

<div <?php hybrid_attr('entry-media'); ?>>
    <?php if (is_singular(get_post_type())) : // If viewing a single post. ?>
        <?php if ($entry_video->get_media()) : ?>
            <!-- 16:9 aspect ratio -->
            <div class="embed-responsive embed-responsive-16by9">
                <?php echo $entry_video->get_media(); ?>
            </div>
        <?php elseif ($entry_gallery): ?>
            <?php echo wobootstrap_get_gallery(array('split_gallery' => true)); ?>
        <?php else: ?>
            <?php printf('<img src="%s" class="%s" alt="%s" itemprop="%s" />', $entry_thumbnail['src'], $entry_thumbnail['class'], $entry_thumbnail['alt'], $entry_thumbnail['itemprop']); ?>
        <?php endif; ?>
    <?php else : // If not viewing a single post. ?>
        <?php if ($entry_thumbnail): ?>
            <?php $attachment_id = attachment_url_to_postid($entry_thumbnail['src']); ?>
            <?php $attachment = get_post($attachment_id); ?>
            <?php $entry_thumbnail = get_the_image(array('size' => 'wb-4by3-small', 'order' => array('featured'), 'format' => 'array')); ?>

            <div class="entry-media__inner has-zoom has-overlay has-action-buttons">
                <div class="entry-thumbnail">
                    <?php printf('<img src="%s" class="%s" alt="%s" itemprop="%s" />', $entry_thumbnail['src'], $entry_thumbnail['class'], $entry_thumbnail['alt'], $entry_thumbnail['itemprop']); ?>
                </div>
                <div class="action-buttons action-buttons_center-center">
                    <?php if ($entry_video->original_media): ?>
                        <?php printf('<a class="popup-video btn animated fadeInLeft" href="%s"><i class="genericons-neue genericons-neue-video"></i></a>', $entry_video->original_media); ?>
                    <?php elseif ($entry_gallery):?>
                        <span class="lightbox-gallery">
                            <?php $ids = explode(',', $entry_gallery['ids']); ?>
                            <?php $i = 0; ?>
                            <?php foreach ($ids as $id): ?>
                                <?php $attachment = get_post($id); ?>
                                <?php $thumbnail = wp_get_attachment_image_src($id, 'wb-16by9-large'); ?>

                                <?php if ($i == 0) : ?>
                                    <?php printf('<a href="%s" class="btn fadeInLeft" title="%s"><span class="genericons-neue genericons-neue-gallery"></span></a>', $thumbnail[0], $attachment->post_excerpt); ?>
                                <?php else : ?>
                                    <?php printf('<a href="%s" class="sr-only" title="%s"></a>', $thumbnail[0], $attachment->post_excerpt ); ?>
                                <?php endif; ?>

                                <?php ++$i; ?>
                            <?php endforeach; ?>
                        </span>
                    <?php else: ?>
                        <?php printf('<a class="magnific-popup-image btn fadeInLeft" href="%s" title="%s"><span class="genericons-neue genericons-neue-picture"></span></a>', $entry_thumbnail['src'], $attachment->post_excerpt); ?>
                    <?php endif; ?>
                    <?php printf('<a href="%s" class="btn animated fadeInRight"><i class="genericons-neue genericons-neue-link"></i></a>', get_permalink()); ?>
                </div>
            </div>
        <?php else: ?>
            <div <?php hybrid_attr('entry-summary'); ?>>
    			<?php the_excerpt(); ?>
    		</div><!-- .entry-summary -->
        <?php endif; ?>
    <?php endif; // End single post check. ?>
</div>
