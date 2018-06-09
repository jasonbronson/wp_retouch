<article <?php hybrid_attr('post'); ?>>
	<?php if (is_singular(get_post_type())) : // If viewing a single post. ?>
		<?php get_the_image(array('size' => 'large-16by9', 'split_content' => true, 'scan_raw' => true, 'scan' => true, 'order' => array( 'scan_raw', 'scan', 'featured', 'attachment' ), 'before' => '<div class="entry-media">', 'after' => '</div>')); ?>
		<div class="entry-inner">
			<header class="entry-header">
				<h1 <?php hybrid_attr('entry-title'); ?>><?php single_post_title(); ?></h1>
				<div class="entry-byline">
					<?php hybrid_post_format_link(); ?>
					<span <?php hybrid_attr('entry-author'); ?>><?php the_author_posts_link(); ?></span>
					<time <?php hybrid_attr('entry-published'); ?>><?php echo get_the_date(); ?></time>
					<?php comments_popup_link(number_format_i18n(0), number_format_i18n(1), '%', 'comments-link', ''); ?>
					<?php edit_post_link(); ?>
				</div><!-- .entry-byline -->
			</header><!-- .entry-header -->

			<div <?php hybrid_attr('entry-content'); ?>>
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php hybrid_post_terms(array('taxonomy' => 'category', 'text' => esc_html__('Posted in %s', 'hybrid-base'))); ?>
				<?php hybrid_post_terms(array('taxonomy' => 'post_tag', 'text' => esc_html__('Tagged %s', 'hybrid-base'), 'before' => '<br />')); ?>
			</footer><!-- .entry-footer -->
		</div>

	<?php else : // If not viewing a single post. ?>
		<?php $post_thumbnail = get_the_image(array('size' => 'full', 'split_content' => true, 'scan_raw' => true, 'scan' => true, 'order' => array( 'scan_raw', 'scan', 'featured', 'attachment' ), 'format' => 'array')); ?>
		<?php if($post_thumbnail): ?>
			<?php $attachment_id = attachment_url_to_postid($post_thumbnail['src']); ?>
	        <?php $attachment = get_post($attachment_id); ?>
			<?php $thumbnail = get_the_image(array('size' => 'small-16by9', 'split_content' => true, 'scan_raw' => true, 'scan' => true, 'order' => array( 'scan_raw', 'scan', 'featured', 'attachment' ), 'format' => 'array')); ?>

			<div <?php hybrid_attr('entry-media'); ?>>
				<div class="entry-media__inner has-action-buttons has-overlay">
		            <a href="<?php echo get_permalink(); ?>" class="entry-thumbnail">
		                <?php printf('<img src="%s" class="%s" alt="%s" itemprop="%s" />', $thumbnail['src'], $thumbnail['class'], $thumbnail['alt'], $thumbnail['itemprop']); ?>
		            </a>
		            <div class="action-buttons action-buttons_top-right">
		                <a class="magnific-popup-image btn fadeIn" href="<?php echo $post_thumbnail['src']; ?>" title="<?php echo $attachment->post_excerpt; ?>">
		                    <span class="genericons-neue genericons-neue-fullscreen"></span>
		                </a>
		            </div>
		        </div>
			</div>
		<?php endif; ?>
		<div class="entry-inner">
			<header class="entry-header">
				<?php
                    if (is_sticky() && is_home() && !is_paged()) {
                        printf('<div class="entry-byline"><span class="entry-sticky">%s</span></div><!-- .entry-byline -->', __('Featured', 'twentyfifteen'));
                    }
                ?>

				<?php the_title('<h2 '.hybrid_get_attr('entry-title').'><a href="'.get_permalink().'" rel="bookmark" itemprop="url">', '</a></h2>'); ?>

				<div class="entry-byline">
					<?php hybrid_post_format_link(); ?>
					<span <?php hybrid_attr('entry-author'); ?>><?php the_author_posts_link(); ?></span>
					<time <?php hybrid_attr('entry-published'); ?>><?php echo get_the_date(); ?></time>
					<?php comments_popup_link(number_format_i18n(0), number_format_i18n(1), '%', 'comments-link', ''); ?>
					<?php edit_post_link(); ?>
				</div><!-- .entry-byline -->

			</header><!-- .entry-header -->

			<div <?php hybrid_attr('entry-summary'); ?>>
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		</div>
	<?php endif; // End single post check. ?>
</article>
