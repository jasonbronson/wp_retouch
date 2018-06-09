                <footer <?php hybrid_attr('footer'); ?>>
                    <?php hybrid_get_sidebar('footer'); // Loads the sidebar/footer.php template. ?>
                    <div class="credit">
                        <div class="container">
                            <?php
                                $copyright_text = get_theme_mod('wb_footer_text', '');
                                if (!empty($copyright_text)) {
                                    echo $copyright_text;
                                } else {
                                    printf(
                                        /* Translators: 1 is current year, 2 is site name/link, 3 is WordPress name/link, and 4 is theme name/link. */
                                        __('%2$s &#169; %1$s. Powered by %3$s and %4$s!', 'hybrid-base'),
                                        date_i18n('Y'), hybrid_get_site_link(), hybrid_get_wp_link(), hybrid_get_theme_link()
                                    );
                                }
                            ?>
                        </div>
                    </div><!-- .credit -->
                </footer><!-- #footer -->
            </div><!-- #container -->
        </div><!-- #page -->
        <?php wp_footer(); // WordPress hook for loading JavaScript, toolbar, and other things in the footer. ?>
    </body>
</html>
