<?php

class BridgeCoreElementorEllipticalSlider extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_elliptical_slider';
    }

    public function get_title() {
        return esc_html__( 'Elliptical Slider', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-elliptical-slider';
    }

    public function get_categories() {
        return [ 'qode' ];
    }

    public static function get_templates() {
        return Elementor\Plugin::instance()->templates_manager->get_source( 'local' )->get_items();
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
            'animation_speed',
            [
                'label' => esc_html__('Animation speed', 'bridge-core'),
                'description' => esc_html__('Speed of slide animation in miliseconds', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => esc_html__('Autoplay', 'bridge-core'),
                'description' => esc_html__('Enable this option if you want to have autoplay Elliptical Slider ', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'no'
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__( 'Image', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $repeater->add_control(
            'elliptical_section_background_color',
            [
                'label' => esc_html__( 'Elliptical Section Background Color', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        bridge_core_generate_elementor_templates_control( $repeater );

        $this->add_control(
            'elliptical_slider_items',
            [
                'label' => esc_html__( 'Elliptical Slider Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__('Elliptical Slider Item'),
            ]
        );


        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();
        $params['holder_data'] = $this->getHolderData( $params );

        ?>

        <div class="qode-elliptical-slider">
            <div class="qode-elliptical-slider-slides" <?php echo bridge_qode_get_inline_attrs( $params['holder_data'] ); ?>>
                <?php foreach ($params['elliptical_slider_items'] as $elliptical_slider_item) {

                    $elliptical_slider_item['image'] = $this->getImageSrc($elliptical_slider_item);
                    $elliptical_slider_item['content'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display($elliptical_slider_item['template_id']);
                    $elliptical_slider_item['svg_style'] = $this->getSvgStyle($elliptical_slider_item);
                    $elliptical_slider_item['background_style'] = $this->getBackgroundStyle($elliptical_slider_item);
                    $elliptical_slider_item['background_image'] = $this->getBackgroundImage($elliptical_slider_item);
                    $elliptical_slider_item['image_holder_background'] = $this->getImageHolderBackground($elliptical_slider_item);

                    echo bridge_core_get_shortcode_template_part('templates/elliptical-slide-template', 'elliptical-slider', '', $elliptical_slider_item);
                }
                ?>
            </div>
        </div>

        <?php
    }

    protected function getHolderData( $params ){
        $data = array();

        if(!empty($params['animation_speed'])){
            $data['data-animation-speed'] = $params['animation_speed'];
        }

        if(!empty($params['autoplay'])){
            $data['data-autoplay'] = $params['autoplay'];
        }

        return $data;
    }

    private function getImageSrc($params) {

        if (is_array($params['image'])) {
            $image_src = wp_get_attachment_url($params['image']['id']);
        } else {
            $image_src = $params['image'];
        }

        return $image_src;

    }
    private function getSvgStyle($params) {

        $style = array();

        if (!empty($params['elliptical_section_background_color'])) {
            $style[] = 'fill:'.$params['elliptical_section_background_color'];
        }

        return implode(';', $style);

    }
    private function getBackgroundStyle($params) {

        $style = array();

        if (!empty($params['elliptical_section_background_color'])) {
            if( is_rtl() ){
                $style[] = 'background: ' . $params['elliptical_section_background_color'];
            } else{
                $style[] = 'background: -webkit-linear-gradient(left, '. $params['elliptical_section_background_color'].' 50%, transparent 50%)';
                $style[] = 'background: linear-gradient(90deg, '. $params['elliptical_section_background_color'].' 50%, transparent 50%);';
            }
        }

        return implode(';', $style);

    }
    private function getImageHolderBackground($params) {

        $style = array();

        if (!empty($params['elliptical_section_background_color'])) {
            $style[] = 'background-color:'.$params['elliptical_section_background_color'];
        }

        return implode(';', $style);

    }
    private function getBackgroundImage($params) {

        $style = array();

        if (!empty($params['image'])) {
            $style[] = 'background-image:url(' .$this->getImageSrc($params).')';
        }

        return implode(';', $style);

    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorEllipticalSlider() );