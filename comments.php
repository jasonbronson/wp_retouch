<?php
// If a post password is required or no comments are given and comments/pings are closed, return.
if (post_password_required() || (!have_comments() && !comments_open() && !pings_open())) {
    return;
}
?>
<section id="comments-template">
	<?php if (have_comments()) : // Check if there are any comments. ?>
		<div id="comments">
			<h3 id="comments-number">
				<?php
                    printf(// WPCS: XSS OK.
                        esc_html(_nx('One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'underscores')),
                        number_format_i18n(get_comments_number()),
                        '<span>'.get_the_title().'</span>'
                    );
                ?>
			</h3>
			<ol class="comment-list">
				<?php wp_list_comments(
                    array(
                        'style' => 'ol',
                        'callback' => 'hybrid_comments_callback',
                        'end-callback' => 'hybrid_comments_end_callback',
                    )
                ); ?>
			</ol><!-- .comment-list -->
			<?php the_comments_pagination(); // Loads the misc/comments-nav.php template. ?>
		</div><!-- #comments-->
	<?php endif; // End check for comments. ?>
	<?php locate_template(array('misc/comments-error.php'), true); // Loads the misc/comments-error.php template. ?>
    <?php comment_form(); // Loads the comment form. ?>
</section><!-- #comments-template -->
