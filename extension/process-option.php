<?php
    /*
     * Method process option
     * # option 1: config font
     * # option 2: process config theme
    */
    if( !is_admin() ):

        add_action( 'wp_head','herz_config_theme' );

        function herz_config_theme() {

            if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :

                    global $herz_options;
                    $herz_favicon = $herz_options['herz_favicon_upload']['url'];

                    if( $herz_favicon != '' ) :

                        echo '<link rel="shortcut icon" href="' . esc_url( $herz_favicon ) . '" type="image/x-icon" />';

                    endif;

            endif;
        }

        // Method add custom css, Css custom add here
        // Inline css add here
        /**
         * Enqueues front-end CSS for the custom css.
         *
         * @see wp_add_inline_style()
         */

        add_action( 'wp_enqueue_scripts', 'herz_custom_css', 99 );

        function herz_custom_css() {

            global $herz_options;

            $herz_typo_selecter_1   =   $herz_options['herz_custom_typography_1_selector'];

            $herz_typo1_font_family   =   $herz_options['herz_custom_typography_1']['font-family'] == '' ? '' : $herz_options['herz_custom_typography_1']['font-family'];

            $herz_css_style = '';

            if ( $herz_typo1_font_family != '' ) :
                $herz_css_style .= ' '.esc_attr( $herz_typo_selecter_1 ).' { font-family: '.balanceTags( $herz_typo1_font_family, true ).' }';
            endif;

            if ( $herz_css_style != '' ) :
                wp_add_inline_style( 'herz-style', $herz_css_style );
            endif;

        }

    endif;
