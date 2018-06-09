<article <?php hybrid_attr('post'); ?>>
    <?php if (is_singular(get_post_type())) : // If viewing a single post. ?>
        <?php echo ($video = hybrid_media_grabber(array('type' => 'video', 'split_media' => true, 'before' => '<div class="entry-media embed-responsive embed-responsive-16by9">', 'after' => '</div>'))); ?>
        <div class="entry-inner">
            <div class="row">
                <div class="col-md-8">
                    <?php locate_template(array('misc/portfolio-detail.php'), true); // Loads the inc/portfolio-detail.php template. ?>
                </div>
                <div class="col-md-4">
                    <?php locate_template(array('misc/portfolio-sidebar.php'), true); // Loads the inc/portfolio-sidebar.php template. ?>
                </div>
            </div>
        </div>
    <?php else : // If not viewing a single post. ?>
        <?php $entry_thumbnail = get_the_image(array('size' => 'full', 'order' => array('featured'), 'format' => 'array')); ?>
        <?php $entry_video = new Hybrid_Media_Grabber( array('type' => 'video', 'split_media' => true)); ?>
        <?php if($entry_thumbnail && $entry_video->original_media): ?>
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
        <div class="entry-inner">
            <?php if(!($entry_thumbnail && $entry_video->original_media)): ?>
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
    <?php endif; // End single post check. ?>
</article><!-- .entry -->
