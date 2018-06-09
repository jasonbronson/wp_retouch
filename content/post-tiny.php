<article <?php hybrid_attr('post'); ?>>
	<?php switch (get_post_format()): case 'gallery': ?>
		<?php echo($entry_media = wobootstrap_get_gallery(array('split_gallery' => true, 'before' => '<div class="entry-media">', 'after' => '</div>'))); ?>
		<?php break; ?>
	<?php case 'image': ?>
		<?php if ($entry_media = get_the_image(array('size' => 'full', 'order' => array('featured'), 'format' => 'array'))): ?>
			<?php $attachment_id = attachment_url_to_postid($entry_media['src']); ?>
			<?php $attachment = get_post($attachment_id); ?>
			<?php $thumbnail = get_the_image(array('size' => 'small-16by9', 'order' => array('featured'), 'format' => 'array')); ?>
			<div class="entry-media">
				<div class="entry-media__inner has-action-buttons has-overlay has-zoom">
					<a class="entry-thumbnail" href="<?php echo get_permalink(); ?>">
						<?php printf('<img src="%s" class="%s" alt="%s" itemprop="%s" />', $thumbnail['src'], $thumbnail['class'], $thumbnail['alt'], $thumbnail['itemprop']); ?>
					</a>
					<div class="action-buttons action-buttons_top-right">
						<?php printf('<a class="magnific-popup-image btn animated fadeIn" href="%s" title="%s"><span class="genericons-neue genericons-neue-fullscreen"></span></a>', $entry_media['src'], $attachment->post_excerpt); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php break; ?>
	<?php case 'video': ?>
		<?php echo($entry_media = hybrid_media_grabber(array('type' => 'video', 'split_media' => true, 'before' => '<div class="entry-media embed-responsive embed-responsive-16by9">', 'after' => '</div>'))); ?>
		<?php break; ?>
	<?php case 'audio': ?>
		<?php echo($entry_media = hybrid_media_grabber(array('type' => 'audio', 'split_media' => true, 'before' => '<div class="entry-media">', 'after' => '</div>'))); ?>
		<?php break; ?>
	<?php default: ?>
		<?php if ($entry_media = get_the_image(array('size' => 'full', 'order' => array('featured'), 'format' => 'array'))): ?>
			<?php $attachment_id = attachment_url_to_postid($entry_media['src']); ?>
			<?php $attachment = get_post($attachment_id); ?>
			<?php $thumbnail = get_the_image(array('size' => 'small-16by9', 'order' => array('featured'), 'format' => 'array')); ?>
			<div class="entry-media">
				<div class="entry-media__inner has-action-buttons has-overlay has-zoom">
					<a class="entry-thumbnail" href="<?php echo get_permalink(); ?>">
						<?php printf('<img src="%s" class="%s" alt="%s" itemprop="%s" />', $thumbnail['src'], $thumbnail['class'], $thumbnail['alt'], $thumbnail['itemprop']); ?>
					</a>
					<div class="action-buttons action-buttons_top-right">
						<?php printf('<a class="magnific-popup-image btn animated fadeIn" href="%s" title="%s"><span class="genericons-neue genericons-neue-fullscreen"></span></a>', $entry_media['src'], $attachment->post_excerpt); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endswitch ?>

	<div class="entry-inner">
		<?php if (in_array(get_post_format(), array('quote', 'status')) && get_the_content()): ?>
			<div <?php hybrid_attr('entry-content'); ?>>
				<?php the_content(); ?>
			</div><!-- .entry-content -->
		<?php else: ?>
			<?php if(empty($entry_media) && ('' != get_the_excerpt())): ?>
				<div <?php hybrid_attr('entry-summary'); ?>>
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
			<?php endif; ?>
		<?php endif; ?>

		<header class="entry-footer">
			<?php the_title('<h2 '.hybrid_get_attr('entry-title').'><a href="'.get_permalink().'" rel="bookmark" itemprop="url">', '</a></h2>'); ?>
			<div class="entry-byline">
				<time <?php hybrid_attr('entry-published'); ?>><?php echo get_the_date(); ?></time>
				<?php comments_popup_link(number_format_i18n(0), number_format_i18n(1), '%', 'comments-link', 'Comments Off'); ?>
				<?php edit_post_link(); ?>
			</div><!-- .entry-byline -->
		</header><!-- .entry-footer -->
	</div>
</article>
