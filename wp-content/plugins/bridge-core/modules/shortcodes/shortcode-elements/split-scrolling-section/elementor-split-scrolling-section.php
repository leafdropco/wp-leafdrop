<?php

class BridgeCoreElementorSplitScrollingSection extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_split_scrolling_section';
    }

    public function get_title() {
        return esc_html__( 'Qode Split Scrolling Section', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-split-scrolling-section';
    }

    public function get_categories() {
        return [ 'qode' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'left_panel',
            [
                'label' => esc_html__( 'Left Fixed Panel', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__('Background Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'background_image',
            [
                'label' => esc_html__('Background Image', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'item_padding',
            [
                'label' => esc_html__('Padding', 'bridge-core'),
                'description' => esc_html__('Insert padding in format: Top Right Bottom Left (e.g. 0px 0px 1px 0px)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'alignment',
            [
                'label' => esc_html__('Content Alignment', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('Default', 'bridge-core'),
                    'left' => esc_html__('Left', 'bridge-core'),
                    'right' => esc_html__('Right', 'bridge-core'),
                    'center' => esc_html__('Center', 'bridge-core'),
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'header_style',
            [
                'label' => esc_html__('Header/Bullets Style', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('Default', 'bridge-core'),
                    'light' => esc_html__('Light', 'bridge-core'),
                    'dark' => esc_html__('Dark', 'bridge-core')
                ],
                'default' => ''
            ]
        );

        bridge_core_generate_elementor_templates_control( $this );

        $this->end_controls_section();

        $this->start_controls_section(
            'right_panel',
            [
                'label' => esc_html__( 'Right Scrolling Panel', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'right_background_color',
            [
                'label' => esc_html__('Background Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'right_background_image',
            [
                'label' => esc_html__('Background Image', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'right_item_padding',
            [
                'label' => esc_html__('Padding', 'bridge-core'),
                'description' => esc_html__('Insert padding in format: Top Right Bottom Left (e.g. 0px 0px 1px 0px)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'right_alignment',
            [
                'label' => esc_html__('Content Alignment', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('Default', 'bridge-core'),
                    'left' => esc_html__('Left', 'bridge-core'),
                    'right' => esc_html__('Right', 'bridge-core'),
                    'center' => esc_html__('Center', 'bridge-core'),
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'right_header_style',
            [
                'label' => esc_html__('Header/Bullets Style', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('Default', 'bridge-core'),
                    'light' => esc_html__('Light', 'bridge-core'),
                    'dark' => esc_html__('Dark', 'bridge-core')
                ],
                'default' => ''
            ]
        );

        bridge_core_generate_elementor_templates_control( $this, array(),  'right_template_id' );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        if( ! empty( $params['background_image'] ) ){
            $params['background_image'] = $params['background_image']['id'];
        };

        if( ! empty( $params['right_background_image'] ) ){
            $params['right_background_image'] = $params['right_background_image']['id'];
        };

        ?>

        <div class="qode-split-scrolling-section">
            <div class="qode-sss-ms-left">
                <?php
                $params['content_data'] = $this->getContentData( $params );
                $params['content_style'] = $this->getContentStyles( $params );
                $params['content'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display($params['template_id']);
                echo bridge_core_get_shortcode_template_part('templates/split-scrolling-section-content-item-template', 'split-scrolling-section', '', $params);
                ?>
            </div>

            <div class="qode-sss-ms-right">
                <?php
                $params['content_data'] = $this->getContentData( $params, false );
                $params['content_style'] = $this->getContentStyles( $params, false );
                $params['content'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display($params['right_template_id']);
                echo bridge_core_get_shortcode_template_part('templates/split-scrolling-section-content-item-template', 'split-scrolling-section', '', $params);
                ?>
            </div>
        </div>

        <?php

    }

    private function getContentData($params, $is_left = true) {
        $data = array();

        $prefix = $is_left ? '' : 'right_';

        if(!empty($params[$prefix . 'header_style'])) {
            $data['data-header-style'] = $params[$prefix . 'header_style'];
        }

        return $data;
    }

    /**
     * Return content Style
     *
     * @param $params
     * @return array
     */
    private function getContentStyles($params, $is_left = true) {
        $styles = array();

        $prefix = $is_left ? '' : 'right_';

        if (!empty($params[$prefix . 'background_color'])) {
            $styles[] = 'background-color: '.$params[$prefix . 'background_color'];
        }

        if (!empty($params[$prefix . 'background_image'])) {
            $url = wp_get_attachment_url($params[$prefix . 'background_image']);
            $styles[] = 'background-image: url('. $url . ')';
        }

        if (!empty($params[$prefix . 'item_padding'])) {
            $styles[] = 'padding: '.$params[$prefix . 'item_padding'];
        }

        if (!empty($params[$prefix . 'alignment'])) {
            $styles[] = 'text-align: '.$params[$prefix . 'alignment'];
        }

        return implode(';', $styles);
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorSplitScrollingSection() );