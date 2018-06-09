<article <?php hybrid_attr('post'); ?>>
    <?php if (is_singular(get_post_type())) : // If viewing a single post. ?>
        <?php echo wobootstrap_get_gallery(array('split_gallery' => true)); ?>
        <div class="entry-inner">
            <?php if (in_array(hybrid_get_theme_layout(), array('1c'))): ?>
                <div class="row">
                    <div class="col-md-8">
                        <?php locate_template(array('misc/portfolio-detail.php'), true); // Loads the inc/portfolio-detail.php template. ?>
                    </div>
                    <div class="col-md-4">
                        <?php locate_template(array('misc/portfolio-sidebar.php'), true); // Loads the inc/portfolio-sidebar.php template. ?>
                    </div>
                </div>
            <?php else: ?>
                <?php locate_template(array('misc/portfolio-detail.php'), true); // Loads the inc/portfolio-detail.php template. ?>
                <?php locate_template(array('misc/portfolio-sidebar.php'), true); // Loads the inc/portfolio-sidebar.php template. ?>
            <?php endif; ?>
        </div>
    <?php else : // If not viewing a single post. ?>
        <?php $entry_gallery = wobootstrap_get_gallery(array('split_gallery' => true, 'format' => 'array')); ?>
        <?php if($entry_gallery): ?>
            <?php $ids = explode(',', $entry_gallery['ids']); ?>
            <?php $lightbox = ''; ?>
            <?php $post_thumbnail = ''; ?>
            <?php $i = 0; ?>
            <?php foreach ($ids as $id): ?>
                <?php $attachment = get_post($id); ?>
                <?php $thumbnail = wp_get_attachment_image_src($id, 'small-4by3'); ?>
                <?php $thumbnail_full = wp_get_attachment_image_src($id, 'full'); ?>

                <?php if ($i == 0) : ?>
                    <?php $post_thumbnail .= sprintf('<img src="%s" alt="%s" />', $thumbnail[0], trim( strip_tags( get_post_meta( $id, '_wp_attachment_image_alt', true ) ) )); ?>
                    <?php $lightbox .= sprintf('<a href="%s" class="btn fadeInLeft" title="%s"><span class="genericons-neue genericons-neue-gallery"></span></a>', $thumbnail_full[0], $attachment->post_excerpt); ?>
                <?php else : ?>
                    <?php $lightbox .= sprintf('<a href="%s" class="sr-only" title="%s"></a>', $thumbnail_full[0], $attachment->post_excerpt ); ?>
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
        <div class="entry-inner">
            <?php if(!$entry_gallery): ?>
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
