<form role="search" method="get" class="navbar-form navbar-left" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form-group">
        <label class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ); ?></label>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Start Typing...', 'placeholder' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </div>
    <button type="button" class="btn navbar-btn btn-link search-btn"><i class="genericons-neue genericons-neue-close-alt"></i></button>
</form>
