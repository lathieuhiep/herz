<?php
global $herz_options;

$herz_logo_image_id    =   $herz_options['herz_logo_image']['id'];
$herz_nav_top_sticky   =   $herz_options['herz_nav_top_sticky'];
?>

<nav id="site-navigation" class="main-navigation<?php echo esc_attr( $herz_nav_top_sticky == 1 ? ' active-sticky-nav' : '' ); ?>">
    <div class="site-navbar navbar-expand-lg">
        <div class="container">
            <div class="site-navigation_warp">
                <div class="site-logo">
                    <a href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
                        <?php
                            if ( !empty( $herz_logo_image_id ) ) :
                                echo wp_get_attachment_image( $herz_logo_image_id, 'full' );
                            else :
                                echo'<img class="logo-default" src="'.esc_url( get_theme_file_uri( '/images/logo.png' ) ).'" alt="'.get_bloginfo('title').'" />';
                            endif;
                        ?>
                    </a>
                </div>

                <div class="site-menu">
                    <?php

                    if ( has_nav_menu('primary') ) :

                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'navbar-nav',
                            'container'      => false,
                        ) ) ;

                    else:

                    ?>

                        <ul class="main-menu">
                            <li>
                                <a href="<?php echo get_admin_url().'/nav-menus.php'; ?>">
                                    <?php esc_html_e( 'ADD TO MENU','herz' ); ?>
                                </a>
                            </li>
                        </ul>

                    <?php endif; ?>

                </div>

                <?php if ( class_exists('Woocommerce') ) : ?>

                    <div class="shop-cart-view d-flex align-items-center">
                        <?php
                        do_action( 'herz_woo_shopping_cart' );

                        the_widget( 'WC_Widget_Cart', '' );
                        ?>
                    </div>

                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>