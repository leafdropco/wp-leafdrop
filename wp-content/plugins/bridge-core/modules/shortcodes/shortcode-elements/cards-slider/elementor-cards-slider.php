<?php

class BridgeCoreElementorCardsSlider extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_cards_slider';
    }

    public function get_title() {
        return esc_html__( 'Cards Slider', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-cards-slider';
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'header_image',
            [
                'label' => esc_html__( 'Card Header Image', 'bridge-core' ),
                'description' => esc_html__( 'Choose image from media library', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'background_color',
            [
                'label' => esc_html__( 'Card Background Color', 'bridge-core' ),
                'description' => esc_html__( 'Choose background Color', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'images',
            [
                'label' => esc_html__( 'Slider Images', 'bridge-core' ),
                'description' => esc_html__( 'Select images from media library', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'active_middle_slide',
            [
                'label' => esc_html__( 'Set Middle Slide as Active on Load', 'bridge-core' ),
                'description' => esc_html__( '', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'false' => esc_html__( 'No', 'bridge-core' ),
                    'true' => esc_html__( 'Yes', 'bridge-core' )
                ],
                'default' => 'false',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'center_slider',
            [
                'label' => esc_html__( 'Center Slide', 'bridge-core' ),
                'description' => esc_html__( 'Set every slide in center of content', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no' => esc_html__( 'No', 'bridge-core' ),
                    'yes' => esc_html__( 'Yes', 'bridge-core' )
                ],
                'default' => 'no',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'bridge-core' ),
                'description' => esc_html__( 'Show curved edges on every slide', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no' => esc_html__( 'No', 'bridge-core' ),
                    'yes' => esc_html__( 'Yes', 'bridge-core' )
                ],
                'default' => 'no',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'box_shadow',
            [
                'label' => esc_html__( 'Box Shadow', 'bridge-core' ),
                'description' => esc_html__( 'Show shadow on every slide', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no' => esc_html__( 'No', 'bridge-core' ),
                    'yes' => esc_html__( 'Yes', 'bridge-core' )
                ],
                'default' => 'no',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'hover_animation',
            [
                'label' => esc_html__( 'Hover Animation', 'bridge-core' ),
                'description' => esc_html__( 'Show hover animation on every slide', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no' => esc_html__( 'No', 'bridge-core' ),
                    'yes' => esc_html__( 'Yes', 'bridge-core' )
                ],
                'default' => 'no',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'show_bullets',
            [
                'label' => esc_html__( 'Show Navigation Bullets', 'bridge-core' ),
                'description' => esc_html__( 'Show navigation bullets under the slider', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no' => esc_html__( 'No', 'bridge-core' ),
                    'yes' => esc_html__( 'Yes', 'bridge-core' )
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'cards_slider_items',
            [
                'label' => esc_html__( 'Cards Slider Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->end_controls_section();

    }

    protected function render(){
        $params = $this->get_settings_for_display();

        ?>

         <div class="qode-cards-holder">
            <div class="qode-cards-header cards">

            </div>

             <div class="qode-card-panes">
        <?php

        foreach ($params['cards_slider_items'] as $item){
            $item['images'] = $this->getSliderImages($item);
            $item['rand_number'] = rand(0, 1000);
            $item['additional_classes'] = $this->getClasses($item);
            $item['show_card'] = $item['background_color'] !== '' && $item['header_image']['id'] !== '' ? true : false;
            if($item['background_color'] !== ''){
                $item['background_color'] = 'background-color:'.$item['background_color'];
            }
            if($item['header_image'] !== ''){
                $item['header_image'] = "background-image:url('".wp_get_attachment_url($item['header_image']['id'])."')";
            }

            ?>

            <?php echo bridge_core_get_shortcode_template_part('templates/cards-slider-item-template', 'cards-slider', '', $item); ?>


            <?php
        }

        ?>
             </div>

         </div>

        <?php



    }

    private function getSliderImages($params) {
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

    /**
     * Return additional classes
     *
     * @param $params
     *
     * @return array
     */
    private function getClasses($params) {
        $classes = '';

        if($params['show_bullets'] == 'no'){
            $classes .= ' navigation-bullets-disabled';
        }

        if($params['border_radius'] == 'yes'){
            $classes .= ' border-radius';
        }

        if($params['box_shadow'] == 'yes'){
            $classes .= ' qode-slide-shadow';
        }

        if($params['hover_animation'] == 'yes'){
            $classes .= ' hover-animation';
        }

        if($params['background_color'] == ''){
            $classes .= ' no-shadow';
        }

        return $classes;

    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorCardsSlider() );