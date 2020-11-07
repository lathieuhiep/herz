<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class herz_widget_news extends Widget_Base {

    public function get_categories() {
        return array( 'herz_widgets' );
    }

    public function get_name() {
        return 'herz-news';
    }

    public function get_title() {
        return esc_html__( 'News', 'herz' );
    }

    public function get_icon() {
        return 'fa fa-newspaper-o';
    }

    protected function _register_controls() {

        /* Section Query */
        $this->start_controls_section(
            'section_query',
            [
                'label' =>  esc_html__( 'Query', 'herz' )
            ]
        );

        $this->add_control(
            'heading',
            [
                'label'         =>  esc_html__( 'Heading', 'herz' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Tin mới nhất', 'herz' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'select_cat',
            [
                'label'         =>  esc_html__( 'Select Category', 'herz' ),
                'type'          =>  Controls_Manager::SELECT,
                'options'       =>  herz_check_get_cat( 'category' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'limit',
            [
                'label'     =>  esc_html__( 'Number of Posts', 'herz' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  5,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label'     =>  esc_html__( 'Order By', 'herz' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'id',
                'options'   =>  [
                    'id'            =>  esc_html__( 'Post ID', 'herz' ),
                    'author'        =>  esc_html__( 'Post Author', 'herz' ),
                    'title'         =>  esc_html__( 'Title', 'herz' ),
                    'date'          =>  esc_html__( 'Date', 'herz' ),
                    'rand'          =>  esc_html__( 'Random', 'herz' ),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label'     =>  esc_html__( 'Order', 'herz' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'ASC',
                'options'   =>  [
                    'ASC'   =>  esc_html__( 'Ascending', 'herz' ),
                    'DESC'  =>  esc_html__( 'Descending', 'herz' ),
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings       =   $this->get_settings_for_display();
        $cat_post       =   $settings['select_cat'];
        $limit_post     =   $settings['limit'];
        $order_by_post  =   $settings['order_by'];
        $order_post     =   $settings['order'];
    ?>

        <div class="element-news">
            <?php if ( !empty( $settings['heading'] ) ) : ?>
                <div class="heading-news d-flex align-items-end">
                    <span class="line flex-grow-1"></span>
                    <h3 class="title flex-grow-0"><?php echo esc_html( $settings['heading'] ); ?></h3>
                    <span class="line flex-grow-1"></span>
                </div>
            <?php
            endif;

            if ( $settings['select_cat'] ) :
                $args = array(
                    'post_type'             =>  'post',
                    'posts_per_page'        =>  $limit_post,
                    'orderby'               =>  $order_by_post,
                    'order'                 =>  $order_post,
                    'cat'                   =>  $cat_post,
                    'ignore_sticky_posts'   =>  1,
                );

                $category_link = get_category_link( $settings['select_cat'] );

                $query = new \ WP_Query( $args );
                if ( $query->have_posts() ) :
            ?>

                    <div class="item-post-warp">
                        <?php

                        while ( $query->have_posts() ):
                            $query->the_post();
                        ?>
                            <div class="item-post">
                                <div class="row custom-row">
                                    <div class="col-12 col-sm-6 col-md-4 custom-col">
                                        <div class="item-post__thumbnail">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                <?php
                                                if ( has_post_thumbnail() ) :
                                                    the_post_thumbnail();
                                                else:
                                                    ?>
                                                    <img src="<?php echo esc_url( get_theme_file_uri( '/images/no-image.png' ) ) ?>" alt="<?php the_title(); ?>" />
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-8 custom-col d-flex flex-column justify-content-between">
                                        <div class="item-content-top">
                                            <h2 class="item-post__title">
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h2>

                                            <div class="item-post__content">
                                                <p>
                                                    <?php
                                                    if ( has_excerpt() ) :
                                                        echo wp_trim_words( get_the_excerpt(), 50, '...' );
                                                    else:
                                                        echo wp_trim_words( get_the_content(), 50, '...' );
                                                    endif;
                                                    ?>
                                                </p>
                                            </div>
                                        </div>

                                        <?php herz_post_meta( true ); ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();

                        ?>
                    </div>

                    <div class="red-more-post">
                        <a href="<?php echo esc_url( $category_link ); ?>">
                            <?php esc_html_e( 'Đọc tiếp', 'herz' ); ?>
                        </a>
                    </div>

            <?php
                endif;
            else:
            ?>
                <h4 class="title">
                    <?php esc_html_e('Chưa chọn danh mục bài viết', 'herz'); ?>
                </h4>
            <?php endif; ?>
        </div>

    <?php

    }

    protected function _content_template() {}

}

Plugin::instance()->widgets_manager->register_widget_type( new herz_widget_news );