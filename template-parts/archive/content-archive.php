<?php

global $herz_options;

$herz_blog_sidebar_archive    =   !empty( $herz_options['herz_blog_sidebar_archive'] ) ? $herz_options['herz_blog_sidebar_archive'] : 'right';
$herz_class_col_content       =   herz_col_use_sidebar( $herz_blog_sidebar_archive, 'herz-sidebar-main' );
$herz_blog_per_row = 12 / $herz_options['herz_blog_per_row'];
$herz_taxonomy = get_queried_object();

?>

<div class="site-container site-blog">
    <?php
    if ( function_exists('z_taxonomy_image') ) :
        if ( !empty( z_taxonomy_image_url() ) ) :
    ?>

        <div class="cate-image">
            <?php z_taxonomy_image(); ?>
        </div>

    <?php
        endif;
    endif;
    ?>

    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr( $herz_class_col_content ); ?>">
                <div class="site-post-content">
                    <?php if(function_exists('bcn_display')) : ?>

                        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                            <div class="breadcrumbs-col">
                                <?php bcn_display(); ?>
                            </div>
                        </div>

                    <?php endif; ?>

                    <?php if ( have_posts() ) : ?>
                        <div class="row">
                            <?php
                            $i = 1;
                            while ( have_posts() ) : the_post();

                            if ( $i == 1 ) :
                                $herz_col = 8;
                            elseif ( $i == 2 ):
                                $herz_col = 4;
                            else:
                                $herz_col = $herz_blog_per_row;
                            endif;
                            ?>

                                <div id="post-<?php the_ID(); ?>" class="item-col d-flex flex-column col-12 col-sm-6 col-lg-<?php echo esc_attr( $herz_col ); ?>">
                                    <?php
                                    if ( $i == 1 ) :
                                        get_template_part( 'template-parts/archive/content', 'archive-first' );
                                    else:
                                        get_template_part( 'template-parts/archive/content', 'archive-info' );
                                    endif;
                                    ?>
                                </div>

                            <?php $i++; endwhile; wp_reset_postdata(); ?>
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