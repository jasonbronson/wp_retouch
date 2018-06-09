<article <?php hybrid_attr('post'); ?>>
	<div class="wrap">
		<?php $entry_thumbnail = get_the_image(array('size' => 'full', 'order' => array('featured', 'attachment'), 'format' => 'array')); ?>
		<?php if ($entry_thumbnail): ?>
			<?php $attachment_id = attachment_url_to_postid($entry_thumbnail['src']); ?>
			<?php $attachment = get_post($attachment_id); ?>
			<?php $entry_thumbnail = get_the_image(array('size' => 'wb-4by3-small', 'order' => array('featured', 'attachment'), 'format' => 'array')); ?>

			<div class="entry-media">
				<div class="entry-media__inner has-action-buttons has-overlay">
					<?php printf('<img src="%s" class="%s" alt="%s" itemprop="%s" />', $entry_thumbnail['src'], $entry_thumbnail['class'], $entry_thumbnail['alt'], $entry_thumbnail['itemprop']); ?>
					<div class="action-buttons action-buttons_top-right">
						<a class="magnific-popup-image btn lightbox fadeIn" href="<?php echo $entry_thumbnail['src']; ?>" title="<?php echo $attachment->post_excerpt; ?>">
							<span class="genericons-neue genericons-neue-fullscreen"></span>
						</a>
					</div>
					<?php $urls = get_post_meta(get_the_ID(), 'urls', true); ?>
					<?php if ($urls) : ?>
						<div class="action-buttons action-buttons_center-center">
							<sapn class="icons">
								<?php $urls = explode("\n", $urls); ?>
								<?php $urls = array_filter($urls, 'trim'); ?>
								<?php foreach ($urls as $url): ?>
									<a href="<?php echo $url; ?>"><span class="sr-only"><?php echo $url; ?></span></a>
								<?php endforeach; ?>
							</sapn>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>

		<div class="entry-inner">
	        <div class="entry-header">
	            <?php the_title('<h2 '.hybrid_get_attr('entry-title').'>', '</h2>'); ?>

				<?php $metas = array(); ?>
	            <?php $occupation = get_post_meta(get_the_ID(), 'occupation', true); ?>
				<?php $company = get_post_meta(get_the_ID(), 'company', true); ?>
				<?php $url = get_post_meta(get_the_ID(), 'url', true); ?>
	            <?php if ($occupation) : ?>
					<?php $metas[] = '<span '.hybrid_get_attr('entry-position').'>'.$occupation.'</span>'; ?>
	            <?php endif; ?>
				<?php if ($company && $url) : ?>
					<?php $metas[] = '<span '.hybrid_get_attr('entry-company').'><a href="'.$url.'">'.$company.'</a></span>'; ?>
				<?php elseif ($company): ?>
					<?php $metas[] = '<span '.hybrid_get_attr('entry-company').'>'.$company.'</span>'; ?>
				<?php endif; ?>

				<?php if($metas): ?>
					<div class="entry-byline">
						<?php echo implode(', ', $metas); ?>
					</div><!-- .entry-byline -->
				<?php endif; ?>
	        </div>

			<div <?php hybrid_attr('entry-summary'); ?>>
				<?php the_excerpt(); ?>
				<?php edit_post_link(); ?>
			</div><!-- .entry-summary -->
		</div>
	</div>
</article><!-- .entry -->
