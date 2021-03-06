<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 *constants
 */
if( !function_exists('herz_setup') ):

    function herz_setup() {

        /**
         * Set the content width based on the theme's design and stylesheet.
         */
        global $content_width;
        if ( ! isset( $content_width ) )
            $content_width = 900;

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain( 'herz', get_parent_theme_file_path( '/languages' ) );

        /**
         * Set up theme defaults and registers support for various WordPress features.
         *
         * Note that this function is hooked into the after_setup_theme hook, which
         * runs before the init hook. The init hook is too late for some features, such
         * as indicating support post thumbnails.
         *
         */
        add_theme_support( 'custom-header' );

        add_theme_support( 'custom-background' );

        //Enable support for Post Thumbnails
        add_theme_support('post-thumbnails');

        // Add RSS feed links to <head> for posts and comments.
        add_theme_support( 'automatic-feed-links' );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menu('primary','Primary Menu');
        register_nav_menu('footer-menu','Footer Menu');

        // add theme support title-tag
        add_theme_support( 'title-tag' );

        /*
	    * This theme styles the visual editor to resemble the theme style,
	    * specifically font, colors, icons, and column width.
	    */
        add_editor_style( array( 'css/editor-style.css', herz_fonts_url()) );
    }

    add_action( 'after_setup_theme', 'herz_setup' );

endif;

/**
 * Required: Plugin Activation
 */
require get_parent_theme_file_path( '/includes/plugin-activation.php' );

/**
* Required: include plugin theme scripts
*/
require get_parent_theme_file_path( '/extension/process-option.php' );

if ( class_exists( 'ReduxFramework' ) ) {
    /*
     * Required: Redux Framework
     */
    require get_parent_theme_file_path( '/extension/option-reudx/theme-options.php' );
}

if ( class_exists( 'RW_Meta_Box' ) ) {
    /*
     * Required: Meta Box Framework
     */
    require get_parent_theme_file_path( '/extension/meta-box/meta-box-options.php' );
    require get_parent_theme_file_path( '/extension/meta-box/custom-link.php' );

}

if ( ! function_exists( 'rwmb_meta' ) ) {

    function rwmb_meta( $key, $args = '', $post_id = null ) {
        return false;
    }

}

if ( did_action( 'elementor/loaded' ) ) :
    /*
     * Required: Elementor
     */
    require get_parent_theme_file_path( '/extension/elementor/elementor.php' );

endif;

/* Require Post Type */

require get_parent_theme_file_path( '/extension/post-type/custom-link.php' );

/* Require Widgets */
foreach(glob( get_parent_theme_file_path( '/extension/widgets/*.php' ) ) as $herz_file_widgets ) {
    require $herz_file_widgets;
}

if ( class_exists('Woocommerce') ) :
    /*
     * Required: Woocommerce
     */
    require get_parent_theme_file_path( '/extension/woocommerce/woo-quick-view.php' );
    require get_parent_theme_file_path( '/extension/woocommerce/woo-template-hooks.php' );
    require get_parent_theme_file_path( '/extension/woocommerce/woo-template-functions.php' );

endif;

/**
 * Required: Register Sidebar
 */
require get_parent_theme_file_path( '/includes/register-sidebar.php' );

/**
 * Required: Theme Scripts
 */
require get_parent_theme_file_path( '/includes/theme-scripts.php' );

/* post formats */
function herz_post_formats() {

	if( has_post_format('audio') || has_post_format('video') ):
		get_template_part( 'template-parts/post/content','video' );
    elseif ( has_post_format('gallery') ):
		get_template_part( 'template-parts/post/content','gallery' );
	else:
		get_template_part( 'template-parts/post/content','image' );
	endif;

}

/* callback comment list */
function herz_comments( $herz_comment, $herz_comment_args, $herz_comment_depth ) {

    if ( 'div' === $herz_comment_args['style'] ) :

        $herz_comment_tag       = 'div';
        $herz_comment_add_below = 'comment';

    else :

        $herz_comment_tag       = 'li';
        $herz_comment_add_below = 'div-comment';

    endif;

?>
    <<?php echo $herz_comment_tag ?> <?php comment_class( empty( $herz_comment_args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

    <?php if ( 'div' != $herz_comment_args['style'] ) : ?>

        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">

    <?php endif; ?>

    <div class="comment-author vcard">
        <?php if ( $herz_comment_args['avatar_size'] != 0 ) echo get_avatar( $herz_comment, $herz_comment_args['avatar_size'] ); ?>

    </div>

    <?php if ( $herz_comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation">
            <?php esc_html_e( 'Your comment is awaiting moderation.', 'herz' ); ?>
        </em>
    <?php endif; ?>

    <div class="comment-meta commentmetadata">
        <div class="comment-meta-box">
             <span class="name">
                <?php comment_author_link(); ?>
            </span>
            <span class="comment-metadata">
                <?php comment_date(); ?>
            </span>

            <?php edit_comment_link( esc_html__( 'Edit ', 'herz' ) ); ?>

            <?php comment_reply_link( array_merge( $herz_comment_args, array( 'add_below' => $herz_comment_add_below, 'depth' => $herz_comment_depth, 'max_depth' => $herz_comment_args['max_depth'] ) ) ); ?>

        </div>

        <div class="comment-text-box">
            <?php comment_text(); ?>
        </div>
    </div>

    <?php if ( 'div' != $herz_comment_args['style'] ) : ?>
        </div>
    <?php endif; ?>

<?php
}
/* callback comment list */

/*
 * Content Nav
 */

if ( ! function_exists( 'herz_comment_nav' ) ) :

    function herz_comment_nav() {
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

    ?>
            <nav class="navigation comment-navigation">
                <h2 class="screen-reader-text">
                    <?php esc_html_e( 'Comment navigation', 'herz' ); ?>
                </h2>

                <div class="nav-links">
                    <?php
                    if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'herz' ) ) ) :
                        printf( '<div class="nav-previous">%s</div>', $prev_link );
                    endif;

                    if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'herz' ) ) ) :
                        printf( '<div class="nav-next">%s</div>', $next_link );
                    endif;
                    ?>
                </div><!-- .nav-links -->
            </nav><!-- .comment-navigation -->

    <?php
        endif;
    }

endif;

/* Start Social Network */
function herz_get_social_url() {

    global $herz_options;
    $herz_social_networks = herz_get_social_network();

    foreach( $herz_social_networks as $herz_social ) :
        $herz_social_url = $herz_options['herz_social_network_' . $herz_social['id']];

        if( $herz_social_url ) :
?>
        <div class="social-network-item item-<?php echo esc_attr( $herz_social['id'] ); ?>">
            <a href="<?php echo esc_url( $herz_social_url ); ?>" target="_blank" title="<?php echo esc_attr( $herz_social['id'] ); ?>">
                <i class="fab fa-<?php echo esc_attr( $herz_social['icon'] ) ?>"></i>
            </a>
        </div>
<?php
        endif;

    endforeach;
}

function herz_get_social_network() {
    return array(

        array( 'id' =>  'facebook', 'icon'  =>  'facebook-f'),
        array( 'id' =>  'instagram', 'icon' =>  'instagram'),
        array( 'id' =>  'youtube', 'icon'   =>  'youtube'),

    );
}
/* End Social Network */

/* Start pagination */
function herz_pagination() {

    the_posts_pagination( array(
        'type'                  =>  'list',
        'mid_size'              =>  2,
        'prev_text'             =>  '<i class="fas fa-angle-left"></i>',
        'next_text'             =>  '<i class="fas fa-angle-right"></i>',
        'screen_reader_text'    =>  '&nbsp;',
    ) );

}

// pagination nav query
function herz_paging_nav_query( $herz_querry ) {

    $herz_pagination_args  =   array(

        'prev_text' => '<i class="fa fa-angle-double-left"></i>' . esc_html__(' Previous', 'herz' ),
        'next_text' => esc_html__('Next', 'herz' ) . '<i class="fa fa-angle-double-right"></i>',
        'current'   => max( 1, get_query_var('paged') ),
        'total'     => $herz_querry -> max_num_pages,
        'type'      => 'list',

    );

    $herz_paginate_links = paginate_links( $herz_pagination_args );

    if ( $herz_paginate_links ) :

    ?>
        <nav class="pagination">
            <?php echo $herz_paginate_links; ?>
        </nav>

    <?php

    endif;

}
/* End pagination */

// Sanitize Pagination
add_action('navigation_markup_template', 'herz_sanitize_pagination');
function herz_sanitize_pagination( $herz_content ) {
    // Remove role attribute
    $herz_content = str_replace('role="navigation"', '', $herz_content);

    // Remove h2 tag
    $herz_content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $herz_content);

    return $herz_content;
}

/* Start Get col global */
function herz_col_use_sidebar( $option_sidebar, $active_sidebar ) {

    if ( $option_sidebar != 'hide' && is_active_sidebar( $active_sidebar ) ):

        if ( $option_sidebar == 'left' ) :
            $class_position_sidebar = ' order-1 order-md-2';
        else:
            $class_position_sidebar = ' order-1';
        endif;

        $class_col_content = 'col-12 col-md-8 col-lg-9' . $class_position_sidebar;
    else:
        $class_col_content = 'col-md-12';
    endif;

    return $class_col_content;
}

function herz_col_sidebar() {
    $class_col_sidebar = 'col-12 col-md-4 col-lg-3';

    return $class_col_sidebar;
}
/* End Get col global */

/* Start Post Meta */
function herz_post_meta( $getAvatar = false ) {
?>

    <div class="site-post-meta">
        <span class="site-post-author">
            <?php
            if ( $getAvatar != false ) :
                echo get_avatar( get_the_author_meta( 'ID' ), 20 );
            endif;
            ?>
            <span><?php the_author();?></span>
        </span>

        <span class="site-post-date">
            <?php echo esc_html( human_time_diff( get_the_time('U'), current_time('timestamp') ) ); ?>
        </span>

        <span class="site-post-cate">
            <?php
            $category = get_the_category();
            echo esc_html( $category[0]->cat_name );
            ?>
        </span>
    </div>

<?php
}
/* End Post Meta */

/* Function which displays your post date in time ago format */
function meks_time_ago() {
    return human_time_diff( get_the_date( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' );
}
/* Start Link Pages */
function herz_link_page() {

    wp_link_pages( array(
        'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'herz' ),
        'after'       => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after'  => '</span>',
    ) );

}
/* End Link Pages */

/* Start comment */
function herz_comment_form() {

    if ( comments_open() || get_comments_number() ) :
?>

        <div class="site-comments">
            <?php comments_template( '', true ); ?>
        </div>

<?php
    endif;
}
/* End comment */

/* Start get Category check box */
function herz_check_get_cat( $type_taxonomy, $multi_select = true ) {

    $cat_check    =   array();

    if ( !$multi_select ) {
        $cat_check[0] = esc_html__('Hiển thị tất cả', 'herz');
    }

    $category     =   get_terms(
        array(
            'taxonomy'      =>  $type_taxonomy,
            'hide_empty'    =>  false
        )
    );

    if ( isset( $category ) && !empty( $category ) ):

        foreach( $category as $item ) {

            $cat_check[$item->term_id]  =   $item->name;

        }

    endif;

    return $cat_check;

}
/* End get Category check box */

/**
*Start share
*/
function herz_post_share() {

?>

    <div class="site-post-share">
        <div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="" data-layout="button_count" data-share="true" data-action="like" data-size="small"></div>
    </div>

<?php

}

/* Get Contact Form */
function herz_get_form_cf7() {

    $herz_contact_forms    =   array();
    $herz_cf7              =   get_posts('post_type="wpcf7_contact_form"&numberposts=-1');

    if ( $herz_cf7 ) :

        foreach ( $herz_cf7 as $item ) :

            $herz_contact_forms[$item->ID] = $item->post_title;

        endforeach;

    else :

        $herz_contact_forms[esc_html__( "No contact forms found", "tz-gustoso-restaurant" )] = 0;

    endif;

    return $herz_contact_forms;

}

/* Start opengraph */
function herz_doctype_opengraph( $output ) {
	return $output . '
 xmlns:og="http://opengraphprotocol.org/schema/"
 xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'herz_doctype_opengraph');

function herz_opengraph() {
	global $post;

	if( is_single() ) :

		if( has_post_thumbnail( $post->ID ) ) :
			$img_src = get_the_post_thumbnail_url( get_the_ID(),'full' );
		else :
			$img_src = get_theme_file_uri( '/images/no-image.png' );
		endif;

		if( $excerpt = $post->post_excerpt ) :
			$excerpt = strip_tags( $post->post_excerpt );
			$excerpt = str_replace( "", "'", $excerpt );
		else :
			$excerpt = get_bloginfo( 'description' );
		endif;

?>
        <meta property="og:title" content="<?php the_title(); ?>"/>
        <meta property="og:description" content="<?php echo esc_attr( $excerpt ); ?>"/>
        <meta property="og:type" content="article"/>
        <meta property="og:url" content="<?php the_permalink(); ?>"/>
        <meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo() ); ?>"/>
        <meta property="og:image" content="<?php echo esc_url( $img_src ); ?>"/>

<?php

	else :
		return;
	endif;
}
add_action( 'wp_head', 'herz_opengraph', 5 );
/* End opengraph */

/* Start Facebook SDK */
function herz_action_footer() {
    global $herz_options;
    $herz_zalo = $herz_options['herz_zalo_number_phone'];

    if ( !empty( $herz_zalo ) ) :
?>
        <a href="http://zalo.me/<?php echo esc_attr( $herz_zalo ); ?>" class="zalo-chat" target="_blank">
            <img src="<?php echo esc_url( get_theme_file_uri( '/images/icon/logo-zalo.png' ) ) ?>" alt="zalo">
        </a>
<?php
    endif;

	if ( is_single() ) :
?>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>
<?php
	endif;
}

add_action( 'wp_footer', 'herz_action_footer' );

/* End share */
function ccw_search_by_title_only( $search, &$wp_query )
{
    global $wpdb;

    if ( empty( $search ) )
        return $search; // skip processing - no search term in query

    $q = $wp_query->query_vars;
    $n = ! empty( $q['exact'] ) ? '' : '%';

    $search =
    $searchand = '';

    foreach ( (array) $q['search_terms'] as $term ) {
        $term = $wpdb->prepare( $wpdb->esc_like( $term ) );
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }

    if ( ! empty( $search ) ) {
        $search = " AND ({$search}) ";
        if ( ! is_user_logged_in() )
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }

    return $search;
}
add_filter( 'posts_search', 'ccw_search_by_title_only', 500, 2 );