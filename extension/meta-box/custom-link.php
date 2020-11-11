<?php

add_filter( 'rwmb_meta_boxes', 'herz_register_meta_boxes_custom_link' );

function herz_register_meta_boxes_custom_link() {

    /* Start meta box post */
    $herz_meta_boxes_custom_link[] = array(
        'id'         => 'custom_link_option',
        'title'      => esc_html__( 'Custom Link Option', 'herz' ),
        'post_types' => array( 'custom_link' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'id' => 'herz_link_custom_link',
                'name' => 'Link',
                'type' => 'text',
                'desc' => 'Please enter link',
                'size' => 50,
            ),

        )
    );
    /* End meta box post */

    return $herz_meta_boxes_custom_link;

}