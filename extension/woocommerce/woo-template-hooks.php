<?php

/**
 * Shop WooCommerce Hooks
 */

/**
 * Layout
 *
 * @see herz_get_cart()
 * @see herz_button_quick_view()
 * @see herz_woo_before_main_content()
 * @see herz_woo_before_shop_loop_open()
 * @see herz_woo_before_shop_loop_close()
 * @see herz_woo_before_shop_loop_item()
 * @see herz_woo_after_shop_loop_item()
 * @see herz_woo_product_thumbnail_open()
 * @see herz_woo_product_thumbnail_close()
 * @see herz_woo_get_product_title()
 * @see herz_woo_after_shop_loop_item_title()
 * @see herz_woo_loop_add_to_cart_open()
 * @see herz_woo_loop_add_to_cart_close()
 * @see herz_woo_get_sidebar()
 * @see herz_woo_after_main_content()
 * @see herz_popup_quick_view_product()
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

add_action( 'herz_woo_shopping_cart', 'herz_get_cart', 5 );

add_action( 'herz_woo_button_quick_view', 'herz_button_quick_view', 5 );

add_action( 'woocommerce_before_main_content', 'herz_woo_before_main_content', 10 );

add_action( 'woocommerce_before_shop_loop', 'herz_woo_before_shop_loop_open',  15 );
add_action( 'woocommerce_before_shop_loop', 'herz_woo_before_shop_loop_close',  35 );

add_action( 'woocommerce_before_shop_loop_item_title', 'herz_woo_product_thumbnail_open', 5 );
add_action( 'woocommerce_before_shop_loop_item_title', 'herz_woo_product_thumbnail_close', 15 );

add_action( 'woocommerce_shop_loop_item_title', 'herz_woo_get_product_title', 10 );

add_action( 'woocommerce_after_shop_loop_item_title', 'herz_woo_after_shop_loop_item_title', 15 );

add_action( 'woocommerce_after_shop_loop_item', 'herz_woo_loop_add_to_cart_open', 4 );
add_action( 'woocommerce_after_shop_loop_item', 'herz_woo_loop_add_to_cart_close', 12 );

add_action ( 'woocommerce_before_shop_loop_item', 'herz_woo_before_shop_loop_item', 5 );
add_action ( 'woocommerce_after_shop_loop_item', 'herz_woo_after_shop_loop_item', 15 );

add_action( 'herz_woo_sidebar', 'herz_woo_get_sidebar', 10 );

add_action( 'woocommerce_after_main_content', 'herz_woo_after_main_content', 10 );

add_action( 'woocommerce_after_main_content', 'herz_popup_quick_view_product', 12 );

/**
 * Single Product
 *
 * @see herz_woo_before_single_product()
 * @see herz_woo_before_single_product_summary_open_warp()
 * @see herz_woo_before_single_product_summary_open()
 * @see herz_woo_before_single_product_summary_close()
 * @see herz_woo_after_single_product_summary_close_warp()
 * @see herz_woo_after_single_product()
 *
 */

add_action( 'woocommerce_before_single_product', 'herz_woo_before_single_product', 5 );

add_action( 'woocommerce_before_single_product_summary', 'herz_woo_before_single_product_summary_open_warp',  1 );

add_action( 'woocommerce_before_single_product_summary', 'herz_woo_before_single_product_summary_open', 5 );
add_action( 'woocommerce_before_single_product_summary', 'herz_woo_before_single_product_summary_close', 30 );

add_action( 'woocommerce_after_single_product_summary', 'herz_woo_after_single_product_summary_close_warp', 5 );

add_action( 'woocommerce_after_single_product', 'herz_woo_after_single_product', 30 );

