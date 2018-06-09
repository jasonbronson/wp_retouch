<?php if(display_page_header()): ?>
    <?php if (!is_front_page() && hybrid_is_plural()) : // If viewing a multi-post page ?>
        <?php locate_template(array('misc/archive-header.php'), true); ?>
    <?php elseif (is_page_template()): ?>
        <?php locate_template(array('misc/page-header.php'), true); ?>
    <?php elseif (!hybrid_is_plural()): ?>
        <?php locate_template(array('misc/post-header.php'), true); ?>
    <?php endif; // End check for multi-post page. ?>
<?php endif; ?>
