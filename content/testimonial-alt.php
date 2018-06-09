<?php if (get_the_content()): ?>
    <article <?php hybrid_attr('post'); ?>>
        <div class="entry-inner">
            <?php $entry_thumbnail = get_the_image(array('size' => 'thumbnail', 'order' => array('featured'), 'format' => 'array')); ?>
            <?php if ($entry_thumbnail): ?>
                <div class="avatar">
                    <img src="<?php echo $entry_thumbnail['src'] ?>" class="<?php echo $entry_thumbnail['class'] ?>" alt="<?php echo $entry_thumbnail['alt']; ?>">
                </div>
            <?php endif; ?>
            <div class="entry-header">
                <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
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
            <div <?php hybrid_attr('entry-content'); ?>>
                <?php the_content(); ?>
            </div><!-- .entry-content -->
        </div>
    </article><!-- .entry -->
<?php endif; ?>
