<?php
get_header();

global $herz_options;

$herz_title = $herz_options['herz_404_title'];
$herz_content = $herz_options['herz_404_editor'];
$herz_background = $herz_options['herz_404_background']['id'];

?>

<div class="site-error text-center">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6">
                <figure class="site-error__image404">
                    <?php
                    if( !empty( $herz_background ) ):
                        echo wp_get_attachment_image( $herz_background, 'full' );
                    else:
                        echo'<img src="'.esc_url( get_theme_file_uri( '/images/404.jpg' ) ).'" alt="'.get_bloginfo('title').'" />';
                    endif;
                    ?>
                </figure>
            </div>

            <div class="col-md-6">
                <h1 class="site-title-404">
                    <?php
                    if ( $herz_title != '' ):
                        echo esc_html( $herz_title );
                    else:
                        esc_html_e( 'Awww...Do Not Cry', 'herz' );
                    endif;
                    ?>
                </h1>

                <div id="site-error-content">
                    <?php
                    if ( $herz_content != '' ) :
                        echo wp_kses_post( $herz_content );
                    else:
                    ?>
                        <p>
                            <?php esc_html_e( 'It is just a 404 Error!', 'herz' ); ?>
                            <br />
                            <?php esc_html_e( 'What you are looking for may have been misplaced', 'herz' ); ?>
                            <br />
                            <?php esc_html_e( 'in Long Term Memory.', 'herz' ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div id="site-error-back-home">
                    <a href="<?php echo esc_url( get_home_url('/') ); ?>" title="<?php echo esc_html__('Go to the Home Page', 'herz'); ?>">
                        <?php esc_html_e('Go to the Home Page', 'herz'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>