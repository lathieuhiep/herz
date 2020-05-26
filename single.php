<?php
get_header();

global $herz_options;

$herz_blog_sidebar_single = !empty( $herz_options['herz_blog_sidebar_single'] ) ? $herz_options['herz_blog_sidebar_single'] : 'right';

$herz_class_col_content = herz_col_use_sidebar( $herz_blog_sidebar_single, 'herz-sidebar-main' );

get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );
?>

<div class="site-container site-single">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr( $herz_class_col_content ); ?>">

                <?php
                if ( have_posts() ) : while (have_posts()) : the_post();

                    get_template_part( 'template-parts/post/content','single' );

                    endwhile;
                endif;
                ?>

            </div>

            <?php
            if ( $herz_blog_sidebar_single !== 'hide' ) :
	            get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

