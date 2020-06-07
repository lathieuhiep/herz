<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class herz_widget_contact_cf7 extends Widget_Base {

    public function get_categories() {
        return array( 'herz_widgets' );
    }

    public function get_name() {
        return 'herz-contact-cf7';
    }

    public function get_title() {
        return esc_html__( 'Contact cf7', 'herz' );
    }

    public function get_icon() {
        return 'eicon-text-area';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Content', 'herz' ),
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

        $this->add_control(
            'select_cf7',
            [
                'label'     =>  esc_html__( 'Select Contact Form CF7', 'herz' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'id',
                'options'   =>  herz_get_form_cf7(),
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

    ?>

        <div class="element-contact-cf7">
            <h3 class="heading text-center">
                <?php echo wp_kses_post( $settings['heading'] ); ?>
            </h3>
            <div class="box">
                <?php echo do_shortcode( '[contact-form-7 id="'.esc_attr( $settings['select_cf7'] ).'"]' ); ?>
            </div>
        </div>

    <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new herz_widget_contact_cf7 );