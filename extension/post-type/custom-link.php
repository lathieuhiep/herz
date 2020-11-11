<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'herz_create_custom_link', 10);

function herz_create_custom_link() {

	/* Start post type template */
	$labels = array(
		'name'                  =>  _x( 'Custom Link', 'post type general name', 'herz' ),
		'singular_name'         =>  _x( 'Custom Link', 'post type singular name', 'herz' ),
		'menu_name'             =>  _x( 'Custom Link', 'admin menu', 'herz' ),
		'name_admin_bar'        =>  _x( 'All Custom Links', 'add new on admin bar', 'herz' ),
		'add_new'               =>  _x( 'Add New', 'Custom Link', 'herz' ),
		'add_new_item'          =>  esc_html__( 'Add New Custom Link', 'herz' ),
		'edit_item'             =>  esc_html__( 'Edit Custom Link', 'herz' ),
		'new_item'              =>  esc_html__( 'New Custom Link', 'herz' ),
		'view_item'             =>  esc_html__( 'View Custom Link', 'herz' ),
		'all_items'             =>  esc_html__( 'All Custom Links', 'herz' ),
		'search_items'          =>  esc_html__( 'Search Custom Link', 'herz' ),
		'not_found'             =>  esc_html__( 'No template found', 'herz' ),
		'not_found_in_trash'    =>  esc_html__( 'No template found in trash', 'herz' ),
		'parent_item_colon'     =>  ''
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'          => 'dashicons-admin-links',
		'capability_type'    => 'post',
        'rewrite'            => false,
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'supports'           => array( 'title', 'thumbnail' ),
	);

	register_post_type('custom_link', $args );
	/* End post type template */

    /* Start taxonomy */
    $taxonomy_labels = array(
        'name'              => _x( 'Custom link categories', 'taxonomy general name', 'herz' ),
        'singular_name'     => _x( 'Custom link category', 'taxonomy singular name', 'herz' ),
        'search_items'      => __( 'Search template category', 'herz' ),
        'all_items'         => __( 'All Category', 'herz' ),
        'parent_item'       => __( 'Parent category', 'herz' ),
        'parent_item_colon' => __( 'Parent category:', 'herz' ),
        'edit_item'         => __( 'Edit category', 'herz' ),
        'update_item'       => __( 'Update category', 'herz' ),
        'add_new_item'      => __( 'Add New category', 'herz' ),
        'new_item_name'     => __( 'New category Name', 'herz' ),
        'menu_name'         => __( 'Categories', 'herz' ),
    );

    $taxonomy_args = array(

        'labels'            => $taxonomy_labels,
        'hierarchical'      => false,
        'public'            => false,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,

    );

    register_taxonomy( 'custom_link_cat', array( 'custom_link' ), $taxonomy_args );
    /* End taxonomy */

}
