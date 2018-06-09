<header <?php hybrid_attr('page-header'); ?>>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 <?php hybrid_attr('archive-title'); ?>><?php single_post_title(); ?></h1>
            </div>
            <div class="col-md-6">
                <?php hybrid_get_menu('breadcrumbs'); // Loads the menu/breadcrumbs.php template. ?>
            </div>
        </div>
    </div>
</header><!-- .archive-header -->
