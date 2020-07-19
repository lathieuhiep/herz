<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class herz_widget_about_text extends Widget_Base {

    public function get_categories() {
        return array( 'herz_widgets' );
    }

    public function get_name() {
        return 'herz-about-text';
    }

    public function get_title() {
        return esc_html__( 'About Text', 'herz' );
    }

    public function get_icon() {
        return 'eicon-text-area';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Text', 'herz' ),
            ]
        );

        $this->add_control(
            'heading',
            [
                'label'         =>  esc_html__( 'Heading', 'herz' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Heading', 'herz' ),
                'label_block'   =>  true
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'list_image',
            [
                'label' => esc_html__( 'Choose Image', 'herz' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'list_title', [
                'label' => esc_html__( 'Title', 'herz' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'List Title' , 'herz' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_description',
            [
                'label' => esc_html__( 'Description', 'herz' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'Default description', 'herz' ),
                'placeholder' => esc_html__( 'Type your description here', 'herz' ),
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'List', 'herz' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => __( 'Title #1', 'herz' ),
                    ],
                    [
                        'list_title' => __( 'Title #2', 'herz' ),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_image_features',
            [
                'label' => esc_html__( 'Image Features', 'herz' ),
            ]
        );

        $this->add_control(
            'image_features',
            [
                'label' => esc_html__( 'Choose Image', 'herz' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

    ?>
        <div class="element-about-text">
            <div class="row align-items-end">
                <div class="col-12 col-lg-6">
                    <h3 class="heading">
                        <?php echo wp_kses_post( $settings['heading'] ); ?>
                    </h3>

                    <div class="row">
                        <?php foreach ( $settings['list'] as $item ) : ?>

                        <div class="col-6 item-col d-flex flex-column">
                            <div class="item">
                                <div class="item-img">
                                    <?php echo wp_get_attachment_image( $item['list_image']['id'], 'full' ); ?>
                                </div>

                                <div class="content">
                                    <h4 class="item-title">
                                        <?php echo wp_kses_post( $item['list_title'] ); ?>
                                    </h4>

                                    <p class="item-desc">
                                        <?php echo wp_kses_post( $item['list_description'] ) ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="img-features">
                        <?php echo wp_get_attachment_image( $settings['image_features']['id'], 'full' ); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new herz_widget_about_text );