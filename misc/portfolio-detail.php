<header class="entry-header">
    <h1 <?php hybrid_attr('entry-title'); ?>><?php single_post_title(); ?></h1>
    <div class="entry-byline">
        <?php hybrid_post_terms(array('taxonomy' => 'portfolio_category')); ?>
        <?php edit_post_link(); ?>
    </div><!-- .entry-byline -->
</header><!-- .entry-header -->
<div <?php hybrid_attr('entry-content'); ?>>
    <?php the_content(); ?>
    <?php wp_link_pages(); ?>
</div><!-- .entry-content -->
