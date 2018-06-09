<article <?php hybrid_attr('post'); ?>>
	<div class="entry-inner">
		<?php $ribbon_text = get_post_meta(get_the_ID(), 'ribbon_text', true); ?>
		<?php $ribbon_visibility = get_post_meta(get_the_ID(), 'ribbon_visibility', true); ?>
		<?php if (!empty($ribbon_text) && $ribbon_visibility) : ?>
			<div class="ribbon">
				<?php echo get_post_meta(get_the_ID(), 'ribbon_text', true); ?>
			</div>
		<?php endif; ?>
		<div class="pricing__header">
			<?php the_title('<h2 '.hybrid_get_attr('entry-title').'>', '</h2>'); ?>

			<?php $summary = get_the_excerpt(); ?>
			<?php if ($summary) : ?>
				<p class="plan_subtitle"><?php echo $summary; ?></p>
			<?php endif; ?>
		</div>


		<?php $price = get_post_meta(get_the_ID(), 'price', true); ?>
		<?php if (!empty($price)): ?>
			<?php $recurrence = get_post_meta(get_the_ID(), 'recurrence', true); ?>
			<?php $currency = get_post_meta(get_the_ID(), 'currency', true); ?>

			<div class="pricing__detail">
				<?php if (!empty($currency)): ?>
					<span class="pricing__currency"><?php echo $currency; ?></span>
				<?php endif; ?>
				<span class="pricing__price"><?php echo $price; ?></span>
				<?php if (!empty($recurrence)): ?>
					<span class="pricing__interval"><?php echo $recurrence; ?></span>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php $features = get_the_content(); ?>
		<?php if (!empty($features)) : ?>
			<div class="pricing__content">
				<ul class="list-unstyled">
					<?php $features_array = explode("\n", $features); ?>
					<?php $features_array = array_filter($features_array, 'trim'); ?>
					<?php foreach ($features_array as $feature): ?>
						<li><?php echo strip_tags($feature, '<strong></strong><br><br/></br><img><a><i></i>'); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>

		<?php $btn_xclass = get_post_meta(get_the_ID(), 'btn_xclass', true) ? ' '.get_post_meta(get_the_ID(), 'btn_xclass', true) : ''; ?>
		<?php $btn_text = get_post_meta(get_the_ID(), 'btn_text', true); ?>
		<?php $btn_url = get_post_meta(get_the_ID(), 'btn_url', true); ?>

		<?php if (!empty($btn_text) && !empty($btn_url)) : ?>
			<div class="pricing__footer">
				<a class="btn<?php echo $btn_xclass; ?>" href="<?php echo $btn_url; ?>"><?php echo $btn_text; ?></a>
			</div>
		<?php endif; ?>
	</div>
</article><!-- .entry -->
