<?php
global $herz_options;

$herz_social_network_title  =   $herz_options['herz_social_network_title'];
$herz_information_contact = $herz_options['herz_information_contact'];
$herz_information_recruitment = $herz_options['herz_information_recruitment'];
$herz_information_faq = $herz_options['herz_information_faq'];

?>

<div class="information">
    <div class="container-fluid d-lg-flex align-items-center justify-content-lg-end">
        <?php if ( !empty( $herz_social_network_title ) ) : ?>
            <div class="text">
                <span>
                    <?php echo esc_html( $herz_social_network_title ); ?>
                </span>
            </div>
        <?php endif; ?>

        <div class="information__social-network d-flex align-items-center">
            <?php herz_get_social_url(); ?>
        </div>

        <div class="information__contact">
            <ul class="d-flex">
                <li>
                    <a href="<?php echo esc_url( $herz_information_contact ); ?>">
                        <img src="<?php echo esc_url( get_theme_file_uri( '/images/icon/icon-email.png' ) ); ?>" alt="<?php esc_attr_e( 'Thông tin liên hệ', 'herz' ); ?>">
                        <span>
                            <?php esc_html_e( 'Thông tin liên hệ', 'herz' ); ?>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo esc_url( $herz_information_recruitment ); ?>">
                        <img src="<?php echo esc_url( get_theme_file_uri( '/images/icon/icon-tuyen-dung.png' ) ); ?>" alt="<?php esc_attr_e( 'Thông tin tuyển dụng', 'herz' ); ?>">
                        <span>
                            <?php esc_html_e( 'Thông tin tuyển dụng', 'herz' ); ?>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo esc_url( $herz_information_faq ); ?>">
                        <img src="<?php echo esc_url( get_theme_file_uri( '/images/icon/icon-faq.png' ) ); ?>" alt="<?php esc_attr_e( 'Câu hỏi thường gặp', 'herz' ); ?>">
                        <span>
                            <?php esc_html_e( 'Câu hỏi thường gặp', 'herz' ); ?>
                        </span>
                    </a>
                </li>

                <li class="dropdown search-box">
                    <a href="#" class="" id="dropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo esc_url( get_theme_file_uri( '/images/icon/icon-search.png' ) ); ?>" alt="<?php esc_attr_e( 'Tìm kiếm', 'herz' ); ?>">
                        <span>
                            <?php esc_html_e( 'Tìm kiếm', 'herz' ); ?>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownSearch">
                        <?php get_search_form(); ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>