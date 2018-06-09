<?php get_header(); // Loads the header.php template. ?>
<?php locate_template(array('misc/sub-header.php'), true); // Loads the misc/sub-header.php template. ?>
<div id="main" class="main">
	<?php do_action('wb_content_before'); ?>
	<main <?php hybrid_attr('content'); ?>>
		<?php if (have_posts()) : // Checks if any posts were found. ?>
			<?php while (have_posts()) : // Begins the loop through found posts. ?>
				<?php the_post(); // Loads the post data. ?>
				<?php hybrid_get_content_template(); // Loads the content/*.php template. ?>
				<?php if (is_singular()) : // If viewing a single post/page/CPT. ?>
					<?php comments_template('', true); // Loads the comments.php template. ?>
				<?php endif; // End check for single post. ?>
			<?php endwhile; // End found posts loop. ?>
			<?php locate_template(array('misc/loop-nav.php'), true); // Loads the misc/loop-nav.php template. ?>
		<?php else : // If no posts were found. ?>
			<?php locate_template(array('content/error.php'), true); // Loads the content/error.php template. ?>
		<?php endif; // End check for posts. ?>
	</main><!-- #content -->
	<?php do_action('wb_content_after'); ?>
	<?php hybrid_get_sidebar('primary'); // Loads the sidebar/primary.php template. ?>
	<?php do_action('wb_sidebar_after'); ?>
</div><!-- #main -->
<?php do_action('wb_before_footer'); ?>
<?php get_footer(); // Loads the footer.php template. ?>
