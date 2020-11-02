<?php

global $herz_options;

$herz_on_off_share_single = $herz_options['herz_on_off_share_single'];

?>

<div id="post-<?php the_ID() ?>" <?php post_class( 'site-post-single-item' ); ?>>
    <?php herz_post_formats(); ?>

    <div class="site-post-content">
        <h2 class="site-post-title">
            <?php the_title(); ?>
        </h2>

        <?php herz_post_meta(); ?>

        <div class="site-post-excerpt style-post-content">
            <?php
            the_content();

            herz_link_page();
            ?>
        </div>

        <div class="read-more-single text-center">
            <a href="javascript:;">
                <?php esc_html_e('Đọc tiếp', 'herz'); ?>
            </a>
        </div>
    </div>

    <?php

    if ( $herz_on_off_share_single == 1 || $herz_on_off_share_single == null ) :

        herz_post_share();

    endif;

    ?>
</div>

<?php
get_template_part( 'template-parts/post/inc','related-post' );

herz_comment_form();