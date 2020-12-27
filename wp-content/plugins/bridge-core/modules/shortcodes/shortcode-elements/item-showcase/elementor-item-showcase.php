<?php

class BridgeCoreElementorItemShowcase extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_item_showcase';
    }

    public function get_title() {
        return esc_html__( 'Item Showcase', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-item-showcase';
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
            'item_image',
            [
                'label' => esc_html__( 'Image', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'image_top_offset',
            [
                'label' => esc_html__( 'Image Top Offset', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '-70px'
            ]
        );

        $repeater = new \Elementor\Repeater();

        bridge_qode_icon_collections()->getElementorParamsArray($repeater, '', '', true);

        $repeater->add_control(
            'item_position',
            [
                'label' => esc_html__( 'Item Position', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'left'=> esc_html__('Left', 'bridge-core'),
                    'right'=> esc_html__('Right', 'bridge-core')
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'item_title',
            [
                'label' => esc_html__( 'Item Title', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'item_text',
            [
                'label' => esc_html__( 'Item Text', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'item_link',
            [
                'label' => esc_html__( 'Item Link', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'icon_background_color',
            [
                'label' => esc_html__( 'Icon Background Color', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'interactive_items',
            [
                'label' => esc_html__( 'Interactive Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ item_title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $item_showcase_classes = array();
        $item_showcase_classes[] = 'clearfix qode-item-showcase';
        $item_showcase_class = implode(' ', $item_showcase_classes);

        $item_image_style = '';
        $item_image_style .= 'margin-top:' . bridge_qode_filter_px($params['image_top_offset']) . 'px;';

        ?>

        <div <?php echo bridge_qode_get_class_attribute($item_showcase_class); ?>>
            <div class="qode-item-image" <?php echo bridge_qode_get_inline_style($item_image_style); ?>>
                <?php
                    if( $params['item_image'] ){ ?>
                        <img class="qode-lazy-image" src="#" alt="<?php esc_html__('item showcase image', 'bridge-core') ?>" data-image="<?php echo wp_get_attachment_image_url($params['item_image']['id'], 'full') ?>" data-lazy="true">
                    <?php }
                ?>
            </div>

            <?php

            foreach ( $params['interactive_items'] as $interactive_item ){

                $interactive_item['icon'] = bridge_qode_icon_collections()->getElementorIconFromIconPack( $interactive_item );
                $interactive_item['item_showcase_list_item_class'] = $this->getItemShowcaseListItemClass($interactive_item);
                $interactive_item['icon_styles'] = $this->getIconStyles($interactive_item);
                $interactive_item['icon_params'] = $this->getIconHtml($interactive_item);

                echo bridge_core_get_shortcode_template_part('templates/item-showcase-list-item-template', 'item-showcase', '', $interactive_item);

            }

            ?>

        </div>

        <?php

    }

    private function getIconHtml($params){

        $icon_params = array();

        if($params['icon_pack'] != '') {
            $icon_params['icon_pack'] = $params['icon_pack'];
        }

        if($params['icon_pack'] == '') {
            $icon_params['icon'] = $params['icon'].' fa';
        } else if($params['icon_pack'] == 'font_elegant') {
            $icon_params['icon'] = $params['fe_icon'];
        } else if($params['icon_pack'] == 'linea_icons') {
            $icon_params['icon'] = $params['linea_icon'];
        } else if( $params['icon_pack'] == 'dripicons'){
            $icon_params['icon'] = $params['dripicon'];
        }

        return implode(' ', $icon_params);
    }

    /**
     * Generates icon styles
     *
     * @param $params
     *
     * @return array
     */
    private function getIconStyles($params){

        $iconStylesArray = array();
        if(!empty($params['icon_color'])) {
            $iconStylesArray[] = 'color:' . $params['icon_color'];
        }

        if(!empty($params['icon_background_color'])) {
            $iconStylesArray[] = 'background-color:' . $params['icon_background_color'];
        }

        return implode(';', $iconStylesArray);
    }

    /**
     * Return Item Showcase List Item Classes
     *
     * @param $params
     * @return array
     */
    private function getItemShowcaseListItemClass($params) {

        $item_showcase_list_item_class = array();

        if ($params['item_position'] !== '') {
            $item_showcase_list_item_class[] = 'qode-item-'. $params['item_position'];
        }

        return implode(' ', $item_showcase_list_item_class);

    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorItemShowcase() );