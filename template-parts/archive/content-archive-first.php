<div class="site-post-item item-first">
    <?php herz_post_formats(); ?>

    <div class="item-content">
        <?php herz_post_meta(); ?>

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

        <div class="link-post">
            <a href="<?php the_permalink();?>" class="text-read-more">
                <?php esc_html_e(  'Đọc thêm','herz' ); ?>
                <i class="fas fa-angle-right"></i>
            </a>
        </div>
    </div>
</div>