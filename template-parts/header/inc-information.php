<?php
global $herz_options;

$herz_information_show_hide = $herz_options['herz_information_show_hide'] == '' ? 1 : $herz_options['herz_information_show_hide'];

if ( $herz_information_show_hide == 1 ) :

$herz_information_address   =   $herz_options['herz_information_address'];
$herz_information_mail      =   $herz_options['herz_information_mail'];
$herz_information_phone     =   $herz_options['herz_information_phone'];

?>

<div class="information">
    <div class="container-fluid d-lg-flex justify-content-lg-end">
        <div class="text">
            <span>Follow Doppelherz tại...</span>
        </div>

        <div class="information__social-network social-network-toTopFromBottom">
            <?php herz_get_social_url(); ?>
        </div>

        <div class="information__contact">
            <?php if ( $herz_information_address != '' ) : ?>

                <span>
                    <i class="fas fa-map-marker" aria-hidden="true"></i>
                    <?php echo esc_html( $herz_information_address ); ?>
                </span>

            <?php
            endif;

            if ( $herz_information_mail != '' ) :
            ?>

                <span>
                    <i class="fas fa-envelope"></i>
                    <?php echo esc_html( $herz_information_mail ); ?>
                </span>

            <?php
            endif;

            if ( $herz_information_phone != '' ) :
            ?>

                <span>
                    <i class="fas fa-mobile-alt"></i>
                    <?php echo esc_html( $herz_information_phone ); ?>
                </span>

            <?php endif; ?>
        </div>
    </div>
</div>

<?php

endif;