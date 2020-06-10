<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class herz_widget_product_carousel extends Widget_Base {

    public function get_categories() {
        return array( 'herz_widgets' );
    }

    public function get_name() {
        return 'herz-product-carousel';
    }

    public function get_title() {
        return esc_html__( 'Product Carousel', 'herz' );
    }

    public function get_icon() {
        return 'fa fa-newspaper-o';
    }

    public function get_script_depends() {
        return ['herz-elementor-custom'];
    }

    protected function _register_controls() {

        /* Section Product */
        $this->start_controls_section(
            'section_content',
            [
                'label' =>  esc_html__( 'Product Carousel', 'herz' )
            ]
        );

        $this->add_control(
            'heading', [
                'label' => esc_html__( 'Heading', 'herz' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Heading' , 'herz' ),
                'label_block' => true,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'list_title', [
                'label' => esc_html__( 'Title', 'herz' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'List Title' , 'herz' ),
                'label_block' => true,
            ]
        );

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
            'list_link',
            [
                'label' => esc_html__( 'Link', 'herz' ),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'herz' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
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

        /* Section More */
        $this->start_controls_section(
            'section_more',
            [
                'label' =>  esc_html__( 'More', 'herz' )
            ]
        );

        $this->add_control(
            'more_image',
            [
                'label' => esc_html__( 'Choose Image', 'herz' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'more_link',
            [
                'label' => esc_html__( 'Link', 'herz' ),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'herz' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->end_controls_section();

        /* Section Layout */
        $this->start_controls_section(
            'section_layout',
            [
                'label' =>  esc_html__( 'Layout Settings', 'herz' )
            ]
        );

        $this->add_control(
            'loop',
            [
                'type'          =>  Controls_Manager::SWITCHER,
                'label'         =>  esc_html__('Loop Slider ?', 'herz'),
                'label_off'     =>  esc_html__('No', 'herz'),
                'label_on'      =>  esc_html__('Yes', 'herz'),
                'return_value'  =>  'yes',
                'default'       =>  'yes',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label'         =>  esc_html__('Autoplay?', 'herz'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_off'     =>  esc_html__('No', 'herz'),
                'label_on'      =>  esc_html__('Yes', 'herz'),
                'return_value'  =>  'yes',
                'default'       =>  'no',
            ]
        );

        $this->add_control(
            'nav',
            [
                'label'         =>  esc_html__('Nav Slider', 'herz'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_on'      =>  esc_html__('Yes', 'herz'),
                'label_off'     =>  esc_html__('No', 'herz'),
                'return_value'  =>  'yes',
                'default'       =>  'yes',
            ]
        );

        $this->add_control(
            'dots',
            [
                'label'         =>  esc_html__('Dots Slider', 'herz'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_on'      =>  esc_html__('Yes', 'herz'),
                'label_off'     =>  esc_html__('No', 'herz'),
                'return_value'  =>  'yes',
                'default'       =>  'yes',
            ]
        );

        $this->add_control(
            'margin_item',
            [
                'label'     =>  esc_html__( 'Space Between Item', 'herz' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  6,
                'min'       =>  0,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'min_width_1200',
            [
                'label'     =>  esc_html__( 'Min Width 1200px', 'herz' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'item',
            [
                'label'     =>  esc_html__( 'Number of Item', 'herz' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  4,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'min_width_992',
            [
                'label'     =>  esc_html__( 'Min Width 992px', 'herz' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'item_992',
            [
                'label'     =>  esc_html__( 'Number of Item', 'herz' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  2,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'min_width_768',
            [
                'label'     =>  esc_html__( 'Min Width 768px', 'herz' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'item_768',
            [
                'label'     =>  esc_html__( 'Number of Item', 'herz' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  2,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'min_width_568',
            [
                'label'     =>  esc_html__( 'Min Width 568px', 'herz' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'item_568',
            [
                'label'     =>  esc_html__( 'Number of Item', 'herz' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  2,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'margin_item_568',
            [
                'label'     =>  esc_html__( 'Space Between Item', 'herz' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  15,
                'min'       =>  0,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'max_width_567',
            [
                'label'     =>  esc_html__( 'Max Width 567px', 'herz' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'item_567',
            [
                'label'     =>  esc_html__( 'Number of Item', 'herz' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  1,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'margin_item_567',
            [
                'label'     =>  esc_html__( 'Space Between Item', 'herz' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  0,
                'min'       =>  0,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings =   $this->get_settings_for_display();
        $data_settings_owl = [
            'loop'          =>  ( 'yes' === $settings['loop'] ),
            'nav'           =>  ( 'yes' === $settings['nav'] ),
            'dots'          =>  ( 'yes' === $settings['dots'] ),
            'margin'        =>  $settings['margin_item'],
            'autoplay'      =>  ( 'yes' === $settings['autoplay'] ),
            'responsive'    => [
                '0' => array(
                    'items'     =>  $settings['item_567'],
                    'margin'    =>  $settings['margin_item_567']
                ),
                '576' => array(
                    'items'     =>  $settings['item_568'],
                    'margin'    =>  $settings['margin_item_568']
                ),
                '768' => array(
                    'items'     =>  $settings['item_768']
                ),
                '992' => array(
                    'items'     =>  $settings['item_992']
                ),
                '1200' => array(
                    'items'     =>  $settings['item']
                ),
            ],
        ];

        $target_more = $settings['more_link']['is_external'] ? ' target=_blank' : '';
        $nofollow_more = $settings['more_link']['nofollow'] ? ' rel=nofollow' : '';

        ?>

            <div class="element-product-carousel">
                <h3 class="heading heading-product">
                    <?php echo wp_kses_post( $settings['heading'] ); ?>
                </h3>

                <div class="custom-owl-carousel custom-equal-height-owl owl-carousel owl-theme" data-settings-owl='<?php echo wp_json_encode( $data_settings_owl ) ; ?>'>
                    <?php
                    foreach ( $settings['list'] as $item ) :
                        $target = $item['list_link']['is_external'] ? ' target=_blank' : '';
                        $nofollow = $item['list_link']['nofollow'] ? ' rel=nofollow' : '';
                    ?>
                    <div class="item">
                        <div class="item-box">
                            <div class="item-img">
                                <?php echo wp_get_attachment_image( $item['list_image']['id'], 'full' ); ?>
                            </div>

                            <h4 class="title-product">
                                <?php echo esc_html( $item['list_title'] ); ?>
                            </h4>
                        </div>
                        <a class="link-product" href="<?php echo esc_url( $item['list_link']['url'] ); ?>"<?php echo esc_attr( $target . $nofollow ) ?>>
                            <?php esc_html_e( 'Thông tin chi tiết', 'herz' ); ?>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <?php endforeach; ?>

                    <div class="item">
                        <div class="item-box">
                            <div class="item-img">
                                <?php echo wp_get_attachment_image( $settings['more_image']['id'], 'full' ); ?>
                            </div>
                        </div>

                        <a class="link-product" href="<?php echo esc_url( $settings['more_link']['url'] ); ?>"<?php echo esc_attr( $target_more . $nofollow_more ) ?>>
                            <?php esc_html_e( 'Xem thêm', 'herz' ); ?>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>

        <?php


    }

    protected function _content_template() {}

}

Plugin::instance()->widgets_manager->register_widget_type( new herz_widget_product_carousel );