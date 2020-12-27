<?php

class BridgeCoreElementorClients extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_clients';
    }

    public function get_title() {
        return esc_html__( 'Qode Clients', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-clients';
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
                    'five_columns' => esc_html__('Five', 'bridge-core'),
                    'six_columns' => esc_html__('Six', 'bridge-core'),
                ],
                'default' => 'four_columns'
            ]
        );

        $this->add_control(
            'hover_effect',
            [
                'label' => esc_html__('Hover Effect', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'default' => esc_html__('Default', 'bridge-core'),
                    'switch_img' => esc_html__('Switch Images', 'bridge-core'),
                ],
                'default' => 'default'
            ]
        );

        $this->add_control(
            'switch_effect',
            [
                'label' => esc_html__('Switch Effect', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'switch_fade' => esc_html__('Fade', 'bridge-core'),
                    'switch_roll' => esc_html__('Roll Over', 'bridge-core'),
                ],
                'default' => 'switch_fade',
                'condition' => [
                    'hover_effect' => 'switch_img'
                ]
            ]
        );

        $this->add_control(
            'disable_separators',
            [
                'label' => esc_html__('Disable Cilents Separators', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('No', 'bridge-core'),
                    'yes' => esc_html__('Yes', 'bridge-core'),
                ],
                'default' => ''
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
            'hover_image',
            [
                'label' => esc_html__('Hover Image', 'bridge-core'),
                'description'	=> esc_html__("You can use this option only if you have chosen 'Switch Images' as hover effect in Qode Clients", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__( 'Link', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'link_target',
            [
                'label' => esc_html__( 'Link Target', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_link_target_array(false),
                'default' => '_self'
            ]
        );

        $this->add_control(
            'clients',
            [
                'label' => esc_html__( 'Client Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__('Client Item'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();
        $params['holderClasses'] = $this->getHolderClasses( $params );

        ?>

        <div class="<?php echo esc_attr( $params['holderClasses'] );?>">

            <?php

                foreach ( $params['clients'] as $client ){

                    if( ! empty( $client['image'] ) ){
                        $client['image'] = $client['image']['id'];
                    }

                    if( ! empty( $client['hover_image'] ) ){
                        $client['hover_image'] = $client['hover_image']['id'];
                    }

                    echo bridge_core_get_shortcode_template_part('templates/client', '_clients', '', $client);

                }

            ?>

        </div>

        <?php

    }

    protected function getHolderClasses($params) {
        $holderClasses = array(
            'qode_clients',
            'clearfix',
            $params['columns']
        );

        if( ! empty( $params['hover_effect'] ) && $params['hover_effect'] ==  'switch_img') {
            $holderClasses[] = 'qode_clients_switch_images';
        } else{
            $holderClasses[] = 'default';
        }

        if( ! empty( $params['hover_effect'] ) && $params['hover_effect'] !==  'default'){
            $holderClasses[] = $params['switch_effect'] == 'switch_fade' ? 'qode_clients_switch_fade' : 'qode_clients_switch_roll';
        }

        if( ! empty( $params['disable_separators'] ) && $params['disable_separators'] ==  'yes'){
            $holderClasses[] = 'qode_clients_separators_disabled';
        }

        return implode(' ', $holderClasses);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorClients() );