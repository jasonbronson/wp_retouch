<?php if(get_theme_mod( 'wb_api_key') && get_theme_mod( 'wb_place_id')): ?>
    <div class="embed-responsive embed-responsive-map">
        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed/v1/place?key=<?php echo get_theme_mod( 'wb_api_key'); ?>&q=place_id:<?php echo get_theme_mod( 'wb_place_id'); ?>"></iframe>
    </div>
<?php endif; ?>
