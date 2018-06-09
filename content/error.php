<article <?php hybrid_attr('post'); ?>>
	<div class="entry-inner">
		<header class="entry-header">
			<h1 class="entry-title"><?php esc_html_e('Nothing found', 'hybrid-base'); ?></h1>
		</header><!-- .entry-header -->

		<div <?php hybrid_attr('entry-content'); ?>>
			<?php echo wpautop(esc_html__('Apologies, but no entries were found.', 'hybrid-base')); ?>
		</div><!-- .entry-content -->
	</div>
</article><!-- .entry -->
