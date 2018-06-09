<article <?php hybrid_attr('post'); ?>>
    <?php if (is_singular(get_post_type())) : // If viewing a single post. ?>
        <?php get_the_image(array('size' => 'large-18by9', 'split_content' => true, 'scan_raw' => true, 'scan' => true, 'order' => array('scan_raw', 'scan', 'featured', 'attachment'), 'link' => false, 'before' => '<div class="entry-media">', 'after' => '</div>')); ?>
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
        <div class="entry-inner">
            <?php if (!$entry_thumbnail): ?>
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
