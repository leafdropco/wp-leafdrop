<?php

class BridgeCoreElementorCoverBoxes extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_cover_boxes';
    }

    public function get_title() {
        return esc_html__( "Cover Boxes", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-cover-boxes';
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
            'active_element',
            [
                'label' => esc_html__( "Active element", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '1'
            ]
        );

        $this->add_control(
            'image1',
            [
                'label' => esc_html__( "Image 1", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'title1',
            [
                'label' => esc_html__( "Title 1", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'title_color1',
            [
                'label' => esc_html__( "Title Color 1", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'text1',
            [
                'label' => esc_html__( "Text 1", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'text_color1',
            [
                'label' => esc_html__( "Text Color 1", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'link1',
            [
                'label' => esc_html__( "Link 1", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'link_label1',
            [
                'label' => esc_html__( "Link label 1", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'target1',
            [
                'label' => esc_html__( "Target 1", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '_self' => esc_html__( 'Self', 'bridge-core' ),
                    '_blank' => esc_html__( 'Blank', 'bridge-core' ),
                    '_parent' => esc_html__( 'Parent', 'bridge-core' ),
                    '_top' => esc_html__( 'Top', 'bridge-core' ),
                ],
                'default' => '_self'
            ]
        );





        $this->add_control(
            'image2',
            [
                'label' => esc_html__( "Image 2", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'title2',
            [
                'label' => esc_html__( "Title 2", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'title_color2',
            [
                'label' => esc_html__( "Title Color 2", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'text2',
            [
                'label' => esc_html__( "Text 2", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'text_color2',
            [
                'label' => esc_html__( "Text Color 2", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'link2',
            [
                'label' => esc_html__( "Link 2", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'link_label2',
            [
                'label' => esc_html__( "Link label 2", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'target2',
            [
                'label' => esc_html__( "Target 2", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '_self' => esc_html__( 'Self', 'bridge-core' ),
                    '_blank' => esc_html__( 'Blank', 'bridge-core' ),
                    '_parent' => esc_html__( 'Parent', 'bridge-core' ),
                    '_top' => esc_html__( 'Top', 'bridge-core' ),
                ],
                'default' => '_self'
            ]
        );



        $this->add_control(
            'image3',
            [
                'label' => esc_html__( "Image 3", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'title3',
            [
                'label' => esc_html__( "Title 3", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'title_color3',
            [
                'label' => esc_html__( "Title Color 3", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'text3',
            [
                'label' => esc_html__( "Text 3", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'text_color3',
            [
                'label' => esc_html__( "Text Color 3", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'link3',
            [
                'label' => esc_html__( "Link 3", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'link_label3',
            [
                'label' => esc_html__( "Link label 3", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'target3',
            [
                'label' => esc_html__( "Target 3", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '_self' => esc_html__( 'Self', 'bridge-core' ),
                    '_blank' => esc_html__( 'Blank', 'bridge-core' ),
                    '_parent' => esc_html__( 'Parent', 'bridge-core' ),
                    '_top' => esc_html__( 'Top', 'bridge-core' ),
                ],
                'default' => '_self'
            ]
        );

        $this->add_control(
            'read_more_button_style',
            [
                'label' => esc_html__( "Read More Button Style", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'Default', 'bridge-core' ),
                    'no' => esc_html__( 'No', 'bridge-core' ),
                    'yes' => esc_html__( 'Yes', 'bridge-core' )
                ],
                'default' => ''
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        if( ! empty( $params['image1'] ) ){
            $params['image1'] = $params['image1']['id'];
        }

        if( ! empty( $params['image2'] ) ){
            $params['image2'] = $params['image2']['id'];
        }

        if( ! empty( $params['image3'] ) ){
            $params['image3'] = $params['image3']['id'];
        }

        echo bridge_core_get_shortcode_template_part('templates/cover-boxes', '_cover-boxes', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorCoverBoxes() );