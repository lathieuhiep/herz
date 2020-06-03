<div class="site-post-item">
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

        <div class="link-post text-right">
            <a href="<?php the_permalink();?>" class="text-read-more">
                <?php esc_html_e(  'Xem thêm','herz' ); ?>
                <i class="fas fa-angle-double-right"></i>
            </a>
        </div>
    </div>
</div>