<div class="site-post-item item-not-first">
    <?php herz_post_formats(); ?>

    <div class="item-content">
        <h2 class="site-post-title">
            <a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
                <?php if ( is_sticky() && is_home() ) : ?>
                    <i class="fa fa-thumb-tack" aria-hidden="true"></i>
                <?php
                endif;

                the_title();
                ?>
            </a>
        </h2>

        <div class="site-post-excerpt">
            <p>
                <?php
                if ( has_excerpt() ) :
                    echo esc_html( get_the_excerpt() );
                else:
                    echo wp_trim_words( get_the_content(), 50, '...' );
                endif;
                ?>
            </p>

            <?php herz_link_page(); ?>
        </div>

        <?php herz_post_meta(true); ?>
    </div>
</div>