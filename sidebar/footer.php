<?php if ( is_active_sidebar( 'footer' ) ) : // If the sidebar has widgets. ?>
    <div id="supplementary">
        <div class="container">
            <div <?php hybrid_attr( 'sidebar', 'footer' ); ?>>
        		<?php dynamic_sidebar( 'footer' ); // Displays the footer sidebar. ?>
        	</div><!-- .sidebar-footer -->
        </div>
    </div><!-- #supplementary -->
<?php endif; // End widgets check. ?>
