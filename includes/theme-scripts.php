<?php

/* GET fonts google */
if ( ! function_exists( 'herz_fonts_url' ) ) :

	function herz_fonts_url() {
		$herz_fonts_url = '';

		/* Translators: If there are characters in your language that are not
		* supported by Open Sans, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$herz_font_google = _x( 'on', 'Google font: on or off', 'herz' );

		if ( 'off' !== $herz_font_google ) {
			$herz_font_families = array();

			if ( 'off' !== $herz_font_google ) {
				$herz_font_families[] = 'Lato:400,700';
			}

			$herz_query_args = array(
				'family' => urlencode( implode( '|', $herz_font_families ) ),
				'subset' => urlencode( 'latin,vietnamese' ),
			);

			$herz_fonts_url = add_query_arg( $herz_query_args, 'https://fonts.googleapis.com/css' );
		}

		return esc_url_raw( $herz_fonts_url );
	}

endif;

// Remove jquery migrate
add_action( 'wp_default_scripts', 'herz_remove_jquery_migrate' );
function herz_remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];
		if ( $script->deps ) {
			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
		}
	}
}

//Register Back-End script
add_action('admin_enqueue_scripts', 'herz_register_back_end_scripts');

function herz_register_back_end_scripts(){

	/* Start Get CSS Admin */
	wp_enqueue_style( 'herz-admin-styles', get_theme_file_uri( '/extension/assets/css/admin-styles.css' ) );

}

//Register Front-End Styles
add_action('wp_enqueue_scripts', 'herz_register_front_end');

function herz_register_front_end() {

	/*
	* Start Get Css Front End
	* */
//	wp_enqueue_style( 'herz-fonts', herz_fonts_url(), array(), null );

	/* Start main Css */
	wp_enqueue_style( 'herz-library', get_theme_file_uri( '/css/library/minify/library.min.css' ), array(), '' );
	/* End main Css */

    /* Start main Css */
    wp_enqueue_style( 'fontawesome-5', get_theme_file_uri( '/fonts/fontawesome/css/all.min.css' ), array(), '5.12.1' );
    /* End main Css */

	/*  Start Style Css   */
	wp_enqueue_style( 'herz-style', get_stylesheet_uri() );
	/*  Start Style Css   */

	/*
	* End Get Css Front End
	* */

	/*
	* Start Get Js Front End
	* */

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'herz-main', get_theme_file_uri( '/js/library/minify/library.min.js' ), array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    if ( class_exists('Woocommerce') ) :

        if ( is_shop() || is_product_category() ) :

            wp_enqueue_script( 'woo-quick-view', get_theme_file_uri( '/js/woo-quick-view.js' ), array(), '', true );

            $herz_woo_quick_view_admin_url    =   admin_url( 'admin-ajax.php' );
            $herz_woo_quick_view_ajax         =   array( 'url' => $herz_woo_quick_view_admin_url );
            wp_localize_script( 'woo-quick-view', 'woo_quick_view_product', $herz_woo_quick_view_ajax );

        endif;

    endif;

	wp_enqueue_script( 'herz-custom', get_theme_file_uri( '/js/custom.js' ), array(), '1.0.0', true );

	/*
   * End Get Js Front End
   * */

}