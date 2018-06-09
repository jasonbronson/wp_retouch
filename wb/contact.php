<?php /* Template Name: Contact */ ?>
<?php get_header(); // Loads the header.php template. ?>
<?php locate_template(array('misc/sub-header.php'), true); // Loads the misc/sub-header.php template. ?>
<?php locate_template(array('misc/map.php'), true); // Loads the misc/map.php template. ?>
<div id="main" class="main">
	<?php do_action('wb_content_before'); ?>
	<main <?php hybrid_attr('content'); ?>>
		<?php if (have_posts()) : // Checks if any posts were found. ?>
			<?php while (have_posts()) : // Begins the loop through found posts. ?>
				<?php the_post(); // Loads the post data. ?>
				<?php the_content(); // Loads the content/*.php template. ?>
			<?php endwhile; // End found posts loop. ?>
			<?php locate_template(array('misc/loop-nav.php'), true); // Loads the misc/loop-nav.php template. ?>
		<?php else : // If no posts were found. ?>
			<?php locate_template(array('content/error.php'), true); // Loads the content/error.php template. ?>
		<?php endif; // End check for posts. ?>
	</main><!-- #content -->
	<?php do_action('wb_content_after'); ?>
	<?php hybrid_get_sidebar('contact'); // Loads the sidebar/primary.php template. ?>
	<?php do_action('wb_sidebar_after'); ?>
</div><!-- #main -->
<?php get_footer(); // Loads the footer.php template. ?>
