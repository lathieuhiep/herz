<?php
get_header();

global $herz_options;
$herz_blog_per_row =   $herz_options['herz_blog_per_row'];

?>
<div class="site-container site-blog site-search">
    <div class="container">
        <div class="site-post-content">
            <h1 class="title-cate">
                <?php
                if ( have_posts() ) :
                    printf( __( 'Kết quả tìm kiếm cho: %s', 'herz' ), '<span>' . get_search_query() . '</span>' );
                else :
                    esc_html_e( 'Không tìm thấy kết quả nào phù hợp', 'herz' );
                endif;
                ?>
            </h1>

            <div class="content-box">
                <?php if ( have_posts() ) : ?>

                <div class="row">
                    <?php while ( have_posts() ) : the_post(); ?>

                        <div id="post-<?php the_ID(); ?>" class="item-col d-flex flex-column col-12 col-sm-6 col-lg-<?php echo esc_attr( 12 / $herz_blog_per_row ); ?>">
                            <?php get_template_part( 'template-parts/archive/content', 'archive-info' ); ?>
                        </div>

                    <?php endwhile; wp_reset_postdata(); ?>
                </div>

                <?php else: ?>

                    <p>
                        <?php _e( 'Rất tiếc, chúng tôi không tìm kiếm thấy kết quả bạn muốn', 'twentyseventeen' ); ?>
                    </p>

                <?php
                    get_search_form();
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
<?php

get_footer();