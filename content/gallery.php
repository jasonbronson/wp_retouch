<article <?php hybrid_attr('post'); ?>>
	<?php echo ($gallery = wobootstrap_get_gallery(array('split_gallery' => true, 'before' => '<div class="entry-media">', 'after' => '</div>'))); ?>
	<div class="entry-inner">
		<?php if (is_singular(get_post_type())) : // If viewing a single post. ?>
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
		<?php else : // If not viewing a single post. ?>
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
				<?php $count = hybrid_get_gallery_item_count(); ?>
				<p class="gallery-count"><?php printf(esc_html(_n('This gallery contains %s item.', 'This gallery contains %s items.', $count, 'hybrid-base')), $count); ?></p>
			</div><!-- .entry-summary -->
		<?php endif; // End single post check. ?>
	</div>
</article><!-- .entry -->