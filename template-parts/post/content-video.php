<?php

$herz_video_post = get_post_meta(  get_the_ID() , 'herz_video_post', true );

if ( !empty( $herz_video_post ) ):

?>

    <div class="site-post-video">
        <?php echo wp_oembed_get( $herz_video_post ); ?>
    </div>

<?php endif;?>