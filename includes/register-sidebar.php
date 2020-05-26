<?php
/**
 * Register Sidebar
 */
add_action( 'widgets_init', 'herz_widgets_init');

function herz_widgets_init() {

	$herz_widgets_arr  =   array(

		'herz-sidebar-main'    =>  array(
			'name'              =>  esc_html__( 'Sidebar Main', 'herz' ),
			'description'       =>  esc_html__( 'Display sidebar right or left on all page.', 'herz' )
		),

		'herz-sidebar-wc' =>  array(
			'name'              =>  esc_html__( 'Sidebar Woocommerce', 'herz' ),
			'description'       =>  esc_html__( 'Display sidebar on page shop.', 'herz' )
		),

		'herz-sidebar-footer-multi-column-1'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 1', 'herz' ),
			'description'       =>  esc_html__('Display footer column 1 on all page.', 'herz' )
		),

		'herz-sidebar-footer-multi-column-2'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 2', 'herz' ),
			'description'       =>  esc_html__('Display footer column 2 on all page.', 'herz' )
		),

		'herz-sidebar-footer-multi-column-3'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 3', 'herz' ),
			'description'       =>  esc_html__('Display footer column 3 on all page.', 'herz' )
		),

		'herz-sidebar-footer-multi-column-4'   =>  array(
			'name'              =>  esc_html__( 'Sidebar Footer Multi Column 4', 'herz' ),
			'description'       =>  esc_html__('Display footer column 4 on all page.', 'herz' )
		)

	);

	foreach ( $herz_widgets_arr as $herz_widgets_id => $herz_widgets_value ) :

		register_sidebar( array(
			'name'          =>  esc_attr( $herz_widgets_value['name'] ),
			'id'            =>  esc_attr( $herz_widgets_id ),
			'description'   =>  esc_attr( $herz_widgets_value['description'] ),
			'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
			'after_widget'  =>  '</section>',
			'before_title'  =>  '<h2 class="widget-title">',
			'after_title'   =>  '</h2>'
		));

	endforeach;

}