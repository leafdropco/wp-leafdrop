<?php

class BridgeCoreElementorPricingTables extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_pricing_tables';
    }

    public function get_title() {
        return esc_html__( 'Pricing Tables', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-pricing-tables';
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
            'columns',
            [
                'label' => esc_html__( 'Columns', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'two_columns' => esc_html__('Two', 'bridge-core'),
                    'three_columns' => esc_html__('Three', 'bridge-core'),
                    'four_columns' => esc_html__('Four', 'bridge-core'),
                ],
                'default' => 'four_columns'
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'type',
            [
                'label' => esc_html__( 'Type', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'standard' => esc_html__('Standard', 'bridge-core'),
                    'advanced' => esc_html__('Advanced', 'bridge-core'),
                ],
                'default' => 'standard'
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__( 'Image', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'type' => 'advanced'
                ]
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__("Basic Plan", "bridge-core"),
            ]
        );

        $repeater->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'Title Tag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'h1',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
                'default' => 'h4',
                'condition' => [
                    'type' => 'advanced'
                ]
            ]
        );

        $repeater->add_control(
            'title_tag_standard',
            [
                'label' => esc_html__( 'Title Tag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'h1',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
                'default' => 'h4',
                'condition' => [
                    'type' => 'standard'
                ]
            ]
        );

        $repeater->add_control(
            'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'type' => 'advanced'
                ]
            ]
        );

        $repeater->add_control(
            'short_info',
            [
                'label' => esc_html__( 'Short Info', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'type' => 'advanced'
                ]
            ]
        );

        $repeater->add_control(
            'additional_info',
            [
                'label' => esc_html__( 'Additional Info', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'type' => 'advanced'
                ]
            ]
        );

        $repeater->add_control(
            'price',
            [
                'label' => esc_html__( 'Price', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '0'
            ]
        );

        $repeater->add_control(
            'currency',
            [
                'label' => esc_html__( 'Currency', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('$', 'bridge-core')
            ]
        );

        $repeater->add_control(
            'price_period',
            [
                'label' => esc_html__( 'Price Period', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '/mo'
            ]
        );

        $repeater->add_control(
            'show_button',
            [
                'label' => esc_html__( 'Show Button', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, true),
                'default' => 'yes'
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'bridge-core'),
                "description" => esc_html__( 'Default label is Purchase', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Purchase', 'bridge-core'),
                'condition' => [
                    'show_button' => 'yes'
                ],
                'default' => esc_html__('Purchase', 'bridge-core')
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__( 'Button Link', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'show_button' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'target',
            [
                'label' => esc_html__( 'Button Target', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_link_target_array(false),
                'condition' => [
                    'show_button' => 'yes'
                ],
                'default' => '_self'
            ]
        );

        $repeater->add_control(
            'button_size',
            [
                'label' => esc_html__( 'Button Size', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'small' => esc_html__('Small', 'bridge-core'),
                    'medium' => esc_html__('Medium', 'bridge-core'),
                    'large' => esc_html__('Large', 'bridge-core'),
                ],
                'default' => 'medium',
                'condition' => [
                    'show_button' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'active',
            [
                'label' => esc_html__( 'Active', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'no',
                'condition' => [
                    'type' => 'standard'
                ]
            ]
        );

        $repeater->add_control(
            'active_text',
            [
                'label' => esc_html__( 'Active text', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'active' => 'yes'
                ],
                'default' => esc_html__('Best price', 'bridge-core')
            ]
        );

        $repeater->add_control(
            'content',
            [
                'label' => esc_html__( 'Content', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => "<li>" . esc_html__('content content content', 'bridge-core') . "</li><li>" . esc_html__('content content content', 'bridge-core') . "</li><li>" . esc_html__('content content content', 'bridge-core') . "</li>"
            ]
        );

        $this->add_control(
            'pricing_tables',
            [
                'label' => esc_html__( 'Pricing Table', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls()
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        ?>

        <div class="qode_pricing_tables clearfix <?php echo esc_attr( $params['columns'] ); ?>">

        <?php

        foreach ($params['pricing_tables'] as $pricing_table){
            if( ! empty( $pricing_table['image'] ) ){
                $pricing_table['image'] = $pricing_table['image']['id'];
            }
            echo bridge_core_get_shortcode_template_part('templates/pricing-table', '_pricing-tables', '', $pricing_table);
        }

        ?>

        </div>

        <?php

    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorPricingTables() );