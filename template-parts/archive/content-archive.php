<?php

global $herz_options;

$herz_blog_sidebar_archive    =   !empty( $herz_options['herz_blog_sidebar_archive'] ) ? $herz_options['herz_blog_sidebar_archive'] : 'right';
$herz_class_col_content       =   herz_col_use_sidebar( $herz_blog_sidebar_archive, 'herz-sidebar-main' );
$herz_blog_per_row            =   $herz_options['herz_blog_per_row'];
$herz_taxonomy = get_queried_object();

?>

<div class="site-container site-blog">
    <?php if ( function_exists('z_taxonomy_image') ) : ?>

    <div class="cate-image">
        <?php z_taxonomy_image(); ?>
    </div>

    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr( $herz_class_col_content ); ?>">
                <div class="site-post-content site-custom-content">
                    <?php if( is_category() ) : ?>

                    <h2 class="title-cate">
                        <?php echo esc_html( $herz_taxonomy->name ); ?>
                    </h2>

                    <?php
                    endif;

                    if ( have_posts() ) :
                    ?>

                        <div class="row">

                            <?php while ( have_posts() ) : the_post(); ?>

                                <div id="post-<?php the_ID(); ?>" class="item-col d-flex flex-column col-12 col-sm-6 col-lg-<?php echo esc_attr( 12 / $herz_blog_per_row ); ?>">
                                    <?php
                                        if ( ! is_search() ):
                                            get_template_part( 'template-parts/archive/content', 'archive-info' );
                                        else:
                                            get_template_part( 'template-parts/search/content', 'search-post' );
                                        endif;
                                    ?>
                                </div>

                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>

                    <?php

                    else:

                        if ( is_search() ) :
                            get_template_part( 'template-parts/search/content', 'search-no-data' );
                        endif;

                    endif; // end if ( have_posts )
                    ?>
                </div>

                <?php herz_pagination(); ?>
            </div>

            <?php
            if ( $herz_blog_sidebar_archive !== 'hide' ) :
                get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>