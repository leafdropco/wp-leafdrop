<?php

class BridgeCoreElementorCardsGallery extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_cards_gallery';
    }

    public function get_title() {
        return esc_html__( 'Cards Gallery', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-cards-gallery';
    }

    public function get_categories() {
        return [ 'qode' ];
    }

    protected function _register_controls(){
        $this->start_controls_section(
            'general',
            [
                'label' => esc_html__( 'General', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'images',
            [
                'label' => esc_html__( 'Images', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'description' => esc_html__('Select images from media library', 'bridge-core')
            ]
        );

        $this->add_control(
            'expanding_side',
            [
                'label' => esc_html__( 'Expanding Side', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'description' => esc_html__( 'Choose on which side images will be expanded', 'bridge-core' ),
                'options' => [
                    'left' => esc_html__( 'Left', 'bridge-core'),
                    'right' => esc_html__( 'Right', 'bridge-core'),
                    'top' => esc_html__( 'Top', 'bridge-core'),
                    'bottom' => esc_html__( 'Bottom', 'bridge-core' )
                ],
                'default' => 'left'
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__( 'Cards Background Color', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'description' => esc_html__( 'Choose on which side images will be expanded', 'bridge-core' ),
                'options' => [
                    'left' => esc_html__( 'Left', 'bridge-core'),
                    'right' => esc_html__( 'Right', 'bridge-core'),
                    'top' => esc_html__( 'Top', 'bridge-core'),
                    'bottom' => esc_html__( 'Bottom', 'bridge-core' )
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $params['images'] = $this->getGalleryImages($params);
        if($params['background_color'] !== ''){
            $params['background_color'] = 'background-color:'.$params['background_color'];
        }

        $params['data_side'] = '';
        if($params['expanding_side'] !== ''){
            $params['data_side'] = 'data-side='.$params['expanding_side'];
        }

        echo bridge_core_get_shortcode_template_part('templates/cards-gallery', 'cards-gallery', '', $params);
    }

    private function getGalleryImages($params) {
        $image_ids = array();
        $images    = array();
        $i         = 0;

        foreach($params['images'] as $image) {
            $id = $image['id'];
            $image['image_id'] = $id;
            $image_original    = wp_get_attachment_image_src($id, 'full');
            $image['url']      = $image_original[0];
            $image['title']    = get_the_title($id);
            $image['image_link'] = get_post_meta($id, 'attachment_image_custom_link', true);
            $image['image_target'] = get_post_meta($id, 'attachment_image_link_target', true);

            $image_dimensions = bridge_qode_get_image_dimensions($image['url']);
            if(is_array($image_dimensions) && array_key_exists('height', $image_dimensions)) {

                if(!empty($image_dimensions['height']) && $image_dimensions['width']) {
                    $image['height'] = $image_dimensions['height'];
                    $image['width']  = $image_dimensions['width'];
                }
            }

            $images[$i] = $image;
            $i++;
        }

        return $images;

    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorCardsGallery() );