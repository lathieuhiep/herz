<?php
/*
 * The Header for our theme.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!--Include Loading Template-->
<?php

global $herz_options;
$herz_number_phone = $herz_options['herz_number_phone'];
$herz_link_facebook = $herz_options['herz_social_network_facebook'];
get_template_part('template-parts/inc','loading');
get_template_part('template-parts/header/inc','header');
get_template_part( 'template-parts/navigation/inc', 'nav-top' );

?>
<!--End Loading Template-->
<div class="contact-us d-flex flex-column align-items-end">
    <a class="phone icon" href="tel:<?php echo esc_attr( $herz_number_phone ); ?>">
        <img src="<?php echo esc_url( get_theme_file_uri( '/images/icon/icon-phone.png' ) ) ?>" alt="phone">
        <span><?php echo esc_html( $herz_number_phone ); ?></span>
    </a>

    <a class="facebook-link icon" href="<?php echo esc_url( $herz_link_facebook ); ?>" target="_blank">
        <i class="fab fa-facebook-f"></i>
    </a>
</div>

<div id="back-top">
    <a href="#">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

<!--Start Sticky Footer-->
<div class="sticky-footer">


