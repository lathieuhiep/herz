<?php

add_filter( 'rwmb_meta_boxes', 'herz_register_meta_boxes' );

function herz_register_meta_boxes() {

    /* Start meta box post */
    $herz_meta_boxes[] = array(
        'id'         => 'jobs_format_option',
        'title'      => esc_html__( 'Jobs Option', 'herz' ),
        'post_types' => array( 'thjm_jobs' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'id'               => 'herz_thumbnail_job',
                'name'             => 'Image Upload',
                'type'             => 'image_advanced',
                'force_delete'     => false,
                'image_size'       => 'thumbnail',
                'max_file_uploads' => 1,
            ),

        )
    );
    /* End meta box post */

    return $herz_meta_boxes;

}