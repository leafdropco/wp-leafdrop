<?php

class BridgeCoreElementorAccordion extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_accordion';
    }

    public function get_title() {
        return esc_html__( 'Qode Accordion', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-accordion';
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
            'style',
            [
                'label' => esc_html__('Style', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'accordion' => esc_html__('Accordion', 'bridge-core'),
                    'toggle' => esc_html__('Toggle', 'bridge-core'),
                ],
                'default' => 'accordion'
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'el_id',
            [
                'label' => esc_html__( 'Section ID', 'bridge-core' ),
                'description' => sprintf( esc_html__( 'Enter optional row ID. Make sure it is unique, and it is valid as w3c specification: %s (Must not have spaces)', 'bridge-core' ), '<a target="_blank" href="http://www.w3schools.com/tags/att_global_id.asp">' . esc_html__( 'link', 'bridge-core' ) . '</a>' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'bridge-core' ),
                'description' => esc_html__( 'Enter accordion section title.', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Section', 'bridge-core'),
            ]
        );

        $repeater->add_control(
            'title_tag',
            [
                'label' => esc_html__("Title Tag", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_title_tag(false, false),
                'default' => 'h4'
            ]
        );

        bridge_qode_icon_collections()->getElementorParamsArray( $repeater, '', '', false );

        $repeater->add_control(
            'content_background_image',
            [
                'label' => esc_html__('Content Background Image', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $repeater->add_control(
            'content_padding',
            [
                'label' => esc_html__('Content Padding', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'description' => esc_html__('Enter padding in format 1px 0 0 1px', 'bridge-core'),
            ]
        );

        $repeater->add_control(
            'content',
            [
                'label' => esc_html__( 'Content', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::WYSIWYG
            ]
        );

        bridge_core_generate_elementor_templates_control( $repeater, array('content' => '') );

        $this->add_control(
            'accordion_items',
            [
                'label' => esc_html__( 'Accordion Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__('Accordion Item'),
            ]
        );


        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();
        $params['holderClasses'] = $this->getHolderClasses( $params );
        ?>

        <div class="qode-accordion-holder clearfix <?php echo esc_attr($params['holderClasses'])?> ">
            <?php foreach ( $params['accordion_items'] as $accordion_item ) {
                $accordion_item['content_style'] = $this->getContentStyle( $accordion_item );
                $accordion_item['content_style'] = $this->getContentStyle( $accordion_item );
                $accordion_item['icon'] = bridge_qode_icon_collections()->getElementorIconFromIconPack( $accordion_item );
                if( empty( $accordion_item['content'] ) ){
                    $accordion_item['content'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $accordion_item['template_id'] );
                };

                echo bridge_core_get_shortcode_template_part('templates/accordion-template', 'accordions', '', $accordion_item);
            } ?>
        </div>

        <?php
    }

    protected function getHolderClasses( $params ){

        $acc_class = array();
        $style = $params['style'];
        switch($style) {
            case 'toggle':
                $acc_class[] = 'qode-toggle';
                $acc_class[] = 'qode-initial';
                break;
            default:
                $acc_class[] = 'qode-accordion';
                $acc_class[] = 'qode-initial';
        }

        return implode(' ', $acc_class);
    }

    private function getContentStyle( $params ) {
        $content_style = array();

        if ($params['content_background_image'] !== ''){

            if (is_array($params['content_background_image'])) {
                $image_src = wp_get_attachment_url($params['content_background_image']['id']);
            } else {
                $image_src = $params['content_background_image'];
            }

            $content_style[] = 'background-image: url('.esc_url($image_src).')';
        }

        if ($params['content_padding'] !== ''){
            $content_style[] = 'padding: '.$params['content_padding'];
        }

        return implode('; ', $content_style);
    }

    protected function getContentClasses( $params ){
        $content_class = '';

        if ($params['iconPackName']) {
            $content_class = 'qode-acc-title-with-icon';
        }

        return $content_class;
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorAccordion() );