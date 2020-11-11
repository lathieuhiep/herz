<?php
global $herz_options;
$herz_link_store = $herz_options['herz_link_store'];
?>

<div class="information">
    <div class="container">
        <div class="header-info-warp d-flex align-items-center">
            <div class="information__social-network d-flex align-items-center flex-grow-0">
                <?php herz_get_social_url(); ?>
            </div>

            <div class="header-search flex-grow-1">
                <?php get_search_form(); ?>
            </div>

            <div class="header-right flex-grow-0">
                <a class="icon language" href="#">
                    <i class="fas fa-language"></i>
                </a>

                <a class="icon cart" href="<?php echo esc_url( $herz_link_store ) ?>" title="store">
                    <img src="<?php echo esc_url( get_theme_file_uri( '/images/icon/icongiohang.png' ) ) ?>" alt="cart">
                </a>
            </div>
        </div>
    </div>
</div>