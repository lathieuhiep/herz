<?php

    $herz_audio = get_post_meta(  get_the_ID() , '_format_audio_embed', true );
    if( $herz_audio != '' ):

?>
        <div class="site-post-audio">

            <?php if( wp_oembed_get( $herz_audio ) ) : ?>

                <?php echo wp_oembed_get( $herz_audio ); ?>

            <?php else : ?>

                <?php echo balanceTags( $herz_audio ); ?>

            <?php endif; ?>

        </div>

<?php endif;?>