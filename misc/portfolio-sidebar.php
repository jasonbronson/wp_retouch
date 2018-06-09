<aside class="entry-footer">
    <div class="entry-byline">
        <?php
            if ($project_client = get_post_meta(get_the_ID(), 'client', true)) {
                printf(
                    '<span %1$s>%2$s</span>',
                    hybrid_get_attr('entry-client'),
                    $project_client
                );
            }

            if ($project_location = get_post_meta(get_the_ID(), 'location', true)) {
                printf(
                    '<span %1$s>%2$s</span>',
                    hybrid_get_attr('entry-location'),
                    $project_location
                );
            }

            if ($start_date = get_post_meta(get_the_ID(), 'start_date', true)) {
                printf(
                    '<span %1$s>%2$s</span>',
                    hybrid_get_attr('entry-date'),
                    $start_date
                );
            }

            if ($end_date = get_post_meta(get_the_ID(), 'end_date', true)) {
                printf(
                    '<span %1$s>%2$s</span>',
                    hybrid_get_attr('entry-date'),
                    $end_date
                );
            }

            if ($portfolio_tags = get_the_term_list(get_the_ID(), 'portfolio_tag', '', ', ')) {
                printf(
                    '<span %1$s>%2$s</span>',
                    hybrid_get_attr('entry-terms', 'portfolio_tag'),
                    $portfolio_tags
                );
            }

            if ($url = get_post_meta(get_the_ID(), 'url', true)) {
                $parse_url = parse_url($url);
                printf(
                    '<span %1$s>%2$s</span>',
                    hybrid_get_attr('entry-website'),
                    sprintf('<a href="%1$s">%2$s</a>', esc_url($url), esc_url($parse_url['host']))
                );
            }

            comments_popup_link('No Comments', '1 Comment', '% Comments', 'comments-link', 'Comments Off');
        ?>
    </div>
</aside>
