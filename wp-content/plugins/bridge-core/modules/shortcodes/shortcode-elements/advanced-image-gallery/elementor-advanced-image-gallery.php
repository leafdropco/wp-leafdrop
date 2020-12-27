<?php

class BridgeCoreElementorAdvancedImageGallery extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_advanced_image_gallery';
    }

    public function get_title() {
        return esc_html__( 'Advanced Image Gallery', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-advanced-image-gallery';
    }

    public function get_categories() {
        return [ 'qode' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'general',
            [
                'label' => esc_html__( 'General', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'custom_class',
            [
                'label' => esc_html__( 'Custom CSS Class', 'bridge-core' ),
                'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'type',
            [
                'label' => esc_html__( 'Gallery Type', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'grid',
                'options' => [
                    'grid' => esc_html__( 'Image Grid', 'bridge-core' ),
                    'masonry' => esc_html__( 'Masonry', 'bridge-core' ),
                    'slider' => esc_html__( 'Slider', 'bridge-core' ),
                    'carousel' => esc_html__( 'Carousel', 'bridge-core' )
                ]
            ]
        );

        $this->add_control(
            'enable_fixed_proportions',
            [
                'label' => esc_html__( 'Enable Fixed Image Proportions', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array( false ),
                'default' => 'no',
                'condition' => [
                    'type' => 'masonry'
                ]
            ]
        );

        $this->add_control(
            'images',
            [
                'label' => esc_html__( 'Images', 'bridge-core' ),
                'description' => esc_html__( 'Select images from media library', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::GALLERY,

            ]
        );

        $this->add_control(
            'image_size',
            [
                'label' => esc_html__( 'Image Size', 'bridge-core' ),
                'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'thumbnail'
            ]
        );

        $this->add_control(
            'enable_image_shadow',
            [
                'label' => esc_html__( 'Enable Image Shadow', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array( false ),
                'default' => 'no'
            ]
        );

        $this->add_control(
            'image_behavior',
            [
                'label' => esc_html__( 'Image Behavior', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'None', 'bridge-core' ),
                    'lightbox' => esc_html__( 'Open Lightbox', 'bridge-core' ),
                    'custom-link' => esc_html__( 'Open Custom Link', 'bridge-core' ),
                    'zoom' => esc_html__( 'Zoom', 'bridge-core' ),
                    'grayscale' => esc_html__( 'Grayscale', 'bridge-core' )
                ]
            ]
        );

        $this->add_control(
            'enable_icon',
            [
                'label' =>  esc_html__( 'Enable Icon on Hover', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'condition' => [
                    'image_behavior' => 'lightbox'
                ],
                'default' => 'no'
            ]
        );

        $this->add_control(
            'custom_links',
            [
                'label' => esc_html__( 'Custom Links', 'bridge-core' ),
                'description' => esc_html__( 'Delimit links by comma', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'condition' => [
                    'image_behavior' => 'custom-link'
                ]
            ]
        );

        $this->add_control(
            'custom_link_target',
            [
                'label' => esc_html__( 'Custom Link Target', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_link_target_array(),
                'condition' => [
                    'image_behavior' => 'custom-link'
                ],
                'default' => '_self'
            ]
        );

        $this->add_control(
            'number_of_columns',
            [
                'label' => esc_html__( 'Number of Columns', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'two' => esc_html__( 'Two', 'bridge-core' ),
                    'three' => esc_html__( 'Three', 'bridge-core' ),
                    'four' => esc_html__( 'Four', 'bridge-core' ),
                    'five' => esc_html__( 'Five', 'bridge-core' ),
                    'six' => esc_html__( 'Six', 'bridge-core' )
                ],
                'condition' => [
                    'type' => array( 'grid', 'masonry' )
                ],
                'default' => 'three'
            ]
        );

        $this->add_control(
            'space_between_items',
            [
                'label' => esc_html__( 'Space Between Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_space_between_items_array(),
                'default' => 'normal'
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'slider_settings',
            [
                'label' => esc_html__( 'Slider Settings', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'number_of_visible_items',
            [
                'label' => esc_html__( 'Number Of Visible Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => esc_html__( 'One', 'bridge-core' ),
                    '2' => esc_html__( 'Two', 'bridge-core' ),
                    '3' => esc_html__( 'Three', 'bridge-core' ),
                    '4' => esc_html__( 'Four', 'bridge-core' ),
                    '5' => esc_html__( 'Five', 'bridge-core' ),
                    '6' => esc_html__( 'Six', 'bridge-core' )
                ],
                'default' => '1',
                'condition' => [
                    'type' => 'carousel'
                ]
            ]
        );

        $this->add_control(
            'slider_loop',
            [
                'label' => esc_html__( 'Enable Slider Loop', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array( false, true ),
                'default' => 'yes',
                'condition' => [
                    'type' => array( 'slider', 'carousel' )
                ]
            ]
        );

        $this->add_control(
            'slider_autoplay',
            [
                'label' => esc_html__( 'Enable Slider Autoplay', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array( false, true ),
                'default' => 'yes',
                'condition' => [
                    'type' => array( 'slider', 'carousel' )
                ]
            ]
        );

        $this->add_control(
            'slider_speed',
            [
                'label' => esc_html__( 'Slide Duration', 'bridge-core' ),
                'description' => esc_html__( 'Default value is 5000 (ms)', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '5000',
                'condition' => [
                    'type' => array( 'slider', 'carousel' )
                ]
            ]
        );

        $this->add_control(
            'slider_speed_animation',
            [
                'label' => esc_html__( 'Slide Animation Duration', 'bridge-core' ),
                'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 600.', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '600',
                'condition' => [
                    'type' => array( 'slider', 'carousel' )
                ]
            ]
        );

        $this->add_control(
            'slider_padding',
            [
                'label' => esc_html__( 'Enable Slider Padding', 'bridge-core' ),
                'description' => esc_html__( 'Padding left and right on stage (can see neighbours).', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'no',
                'options' => bridge_qode_get_yes_no_select_array( false ),
                'condition' => [
                    'type' => array( 'slider', 'carousel' )
                ]
            ]
        );

        $this->add_control(
            'slider_navigation',
            [
                'label' => esc_html__( 'Enable Slider Navigation Arrows', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'yes',
                'options' =>  bridge_qode_get_yes_no_select_array( false, true ),
                'condition' => [
                    'type' => array( 'slider', 'carousel' )
                ]
            ]
        );

        $this->add_control(
            'slider_pagination',
            [
                'label' => esc_html__( 'Enable Slider Pagination', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'yes',
                'options' =>  bridge_qode_get_yes_no_select_array( false, true ),
                'condition' => [
                    'type' => array( 'slider', 'carousel' )
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render(){
        $params = $this->get_settings_for_display();
        $args   = array(
            'custom_class'            => '',
            'type'                    => 'grid',
            'enable_fixed_proportions'=> 'no',
            'images'                  => '',
            'image_size'              => 'thumbnail',
            'enable_image_shadow'     => 'no',
            'image_behavior'          => '',
            'enable_icon'			  => 'no',
            'custom_links'            => '',
            'custom_link_target'      => '_self',
            'number_of_columns'       => 'three',
            'space_between_items'     => 'normal',
            'number_of_visible_items' => '1',
            'slider_loop'             => 'yes',
            'slider_autoplay'         => 'yes',
            'slider_speed'            => '5000',
            'slider_speed_animation'  => '600',
            'slider_padding'          => 'no',
            'slider_navigation'       => 'yes',
            'slider_pagination'       => 'yes'
        );
        $params = shortcode_atts( $args, $params );

        $params['holder_classes'] = $this->getHolderClasses( $params, $args );
        $params['inner_classes']  = $this->getInnerClasses( $params, $args );
        $params['slider_data']    = $this->getSliderData( $params );

        $params['type']               = ! empty( $params['type'] ) ? $params['type'] : $args['type'];
        $params['images']             = $this->getGalleryImages( $params );
        $params['image_size']         = $this->getImageSize( $params['image_size'] );
        $params['image_behavior']     = ! empty( $params['image_behavior'] ) ? $params['image_behavior'] : $args['image_behavior'];
        $params['custom_links']       = $this->getCustomLinks( $params );
        $params['custom_link_target'] = ! empty( $params['custom_link_target'] ) ? $params['custom_link_target'] : $args['custom_link_target'];

        echo bridge_core_get_shortcode_template_part( 'templates/' . $params['type'], 'advanced-image-gallery', '', $params );;
    }

    private function getHolderClasses( $params, $args ) {
        $holderClasses = array();

        $holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
        $holderClasses[] = ! empty( $params['type'] ) ? 'qode-aig-' . $params['type'] . '-type' : 'qode-aig-' . $args['type'] . '-type';
        $holderClasses[] = ! empty( $params['space_between_items'] ) ? 'qode-' . $params['space_between_items'] . '-space' : 'qode-' . $args['space_between_items'] . '-space';
        $holderClasses[] = $params['enable_image_shadow'] === 'yes' ? 'qode-has-shadow' : '';
        $holderClasses[] = ! empty( $params['image_behavior'] ) ? 'qode-image-behavior-' . $params['image_behavior'] : '';
        $holderClasses[] = $params['enable_fixed_proportions'] === 'yes' ? 'qode-aig-images-fixed' : '';

        return implode( ' ', $holderClasses );
    }

    private function getInnerClasses( $params, $args ) {
        $holderClasses = array();

        $holderClasses[] = $params['type'] === 'masonry' ? 'qode-aig-masonry' : 'qode-aig-grid';
        $holderClasses[] = ! empty( $params['number_of_columns'] ) ? 'qode-aig-' . $params['number_of_columns'] . '-columns' : 'qode-aig-' . $args['number_of_columns'] . '-columns';

        return implode( ' ', $holderClasses );
    }

    private function getSliderData( $params ) {
        $slider_data = array();

        $slider_data['data-number-of-items']        = $params['number_of_visible_items'] !== '' && $params['type'] === 'carousel' ? $params['number_of_visible_items'] : '1';
        $slider_data['data-enable-loop']            = ! empty( $params['slider_loop'] ) ? $params['slider_loop'] : '';
        $slider_data['data-enable-autoplay']        = ! empty( $params['slider_autoplay'] ) ? $params['slider_autoplay'] : '';
        $slider_data['data-slider-speed']           = ! empty( $params['slider_speed'] ) ? $params['slider_speed'] : '5000';
        $slider_data['data-slider-speed-animation'] = ! empty( $params['slider_speed_animation'] ) ? $params['slider_speed_animation'] : '600';
        $slider_data['data-slider-padding']         = ! empty( $params['slider_padding'] ) ? $params['slider_padding'] : '';
        $slider_data['data-enable-navigation']      = ! empty( $params['slider_navigation'] ) ? $params['slider_navigation'] : '';
        $slider_data['data-enable-pagination']      = ! empty( $params['slider_pagination'] ) ? $params['slider_pagination'] : '';

        return $slider_data;
    }

    private function getGalleryImages( $params ) {
        $images    = array();
        $i         = 0;

        foreach ( $params['images'] as $image ) {
            $id = $image['id'];
            $id = apply_filters('wpml_object_id', $id, 'attachment');
            $image['image_id'] = $id;
            $image_original    = wp_get_attachment_image_src( $id, 'full' );
            $image['url']      = $image_original[0];
            $image['title']    = get_the_title( $id );
            $image['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );

            $images[ $i ] = $image;
            $i ++;
        }

        return $images;
    }

    private function getImageSize( $image_size ) {
        $image_size = trim( $image_size );
        //Find digits
        preg_match_all( '/\d+/', $image_size, $matches );
        if ( in_array( $image_size, array( 'thumbnail', 'thumb', 'medium', 'large', 'full' ) ) ) {
            return $image_size;
        } elseif ( ! empty( $matches[0] ) ) {
            return array(
                $matches[0][0],
                $matches[0][1]
            );
        } else {
            return 'thumbnail';
        }
    }

    private function getCustomLinks( $params ) {
        $custom_links = array();

        if ( ! empty( $params['custom_links'] ) ) {
            $custom_links = array_map( 'trim', explode( ',', $params['custom_links'] ) );
        }

        return $custom_links;
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorAdvancedImageGallery() );

