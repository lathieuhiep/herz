<?php

global $herz_options;

$herz_show_loading = $herz_options['herz_general_show_loading'] == '' ? '0' : $herz_options['herz_general_show_loading'];

if(  $herz_show_loading == 1 ) :

    $herz_loading_url  = $herz_options['herz_general_image_loading']['url'];
?>

    <div id="site-loadding" class="d-flex align-items-center justify-content-center">

        <?php  if( $herz_loading_url !='' ): ?>

            <img class="loading_img" src="<?php echo esc_url( $herz_loading_url ); ?>" alt="<?php esc_attr_e('loading...','herz') ?>"  >

        <?php else: ?>

            <img class="loading_img" src="<?php echo esc_url(get_theme_file_uri( '/images/loading.gif' )); ?>" alt="<?php esc_attr_e('loading...','herz') ?>">

        <?php endif; ?>

    </div>

<?php endif; ?>