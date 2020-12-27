<?php

class BridgeCoreElementorWorkflow extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_workflow';
    }

    public function get_title() {
        return esc_html__( 'Workflow', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-workflow';
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
            'el_class',
            [
                'label' => esc_html__('Extra class name', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'bridge-core')
            ]
        );

        $this->add_control(
            'line_color',
            [
                'label' => esc_html__('Workflow line color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'description' => esc_html__('Pick a color for the workflow line.', 'bridge-core')
            ]
        );

        $this->add_control(
            'animate',
            [
                'label' => esc_html__('Animate Workflow', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'description' => esc_html__('Animate Workflow shortcode when it comes into viewport', 'bridge-core'),
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'yes'
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'bridge-core'),
                'description' => esc_html__('Enter workflow item title.', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'title_tag',
            [
                'label' => esc_html__('Title Tag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
                'default' => 'h3',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'bridge-core'),
                'description' => esc_html__('Enter workflow item subtitle.', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'subtitle_tag',
            [
                'label' => esc_html__('Subtitle Tag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
                'default' => 'h6',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'text',
            [
                'label' => esc_html__('Text', 'bridge-core'),
                'description' => esc_html__('Enter workflow item text.', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'bridge-core'),
                'description' => esc_html__('Insert workflow item image.', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'image_float',
            [
                'label' => esc_html__('Set image on right side', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'image_alignment',
            [
                'label' => esc_html__('Image alignment', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'center' => esc_html__('Center', 'bridge-core'),
                    'left' => esc_html__('Left', 'bridge-core'),
                    'right' => esc_html__('Right', 'bridge-core')
                ],
                'default' => 'center',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'circle_border_color',
            [
                'label' => esc_html__('Circle border color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'description' => esc_html__('Pick a color for the circle border color.', 'bridge-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'circle_background_color',
            [
                'label' => esc_html__('Circle background color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'description' => esc_html__('Pick a color for the circle background color.', 'bridge-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'workflow_items',
            [
                'label' => esc_html__( 'Workflow Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );


        $this->end_controls_section();

    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $style_params = $this->getStyleProperties($params);
        $params       = array_merge($params, $style_params);

        $params['el_class'] = $this->getWorkflowClasses($params);

        ?>

        <div class="qode-workflow <?php echo esc_attr($params['el_class']) ?>">
            <span class="main-line" style="<?php echo esc_attr($params['main_line_style']); ?>"></span>
            <?php

            foreach( $params['workflow_items'] as $workflow_item ){

                if( ! empty( $workflow_item['image'] ) ){
                    $workflow_item['image'] = $workflow_item['image']['id'];
                }
                $style_params = $this->getItemStyleProperties($workflow_item);
                $workflow_item       = array_merge($workflow_item, $style_params);
                extract($params);

                $workflow_item['image_on_right_class'] = $this->imageOnRightSideClass($workflow_item);

                echo bridge_core_get_shortcode_template_part('templates/workflow-item-template', 'workflow', '', $workflow_item);

            }

            ?>
        </div>

        <?php

    }

    /**
     * Generates workflow extra classes
     *
     * @param $params
     *
     * @return string
     */
    private function getWorkflowClasses($params) {

        $el_class = '';
        $class    = $params['el_class'];

        if($class !== '') {
            $el_class .= $class;
        }

        if($params['animate'] == 'yes') {
            $el_class .= ' qode-workflow-animate';
        }

        return $el_class;
    }

    /**
     * Generates main line color
     *
     * @param $params
     *
     * @return array
     */

    private function getStyleProperties($params) {

        $style                    = array();
        $style['main_line_style'] = '';

        if($params['line_color'] !== '') {
            $style['main_line_style'] = 'background-color:'.$params['line_color'].';';
        }

        return $style;
    }

    /**
     * Checks if image is set to be on right and set class
     *
     * @param $params
     *
     * @return string
     */
    private function imageOnRightSideClass($params) {

        $class = '';

        if($params['image_float'] == 'yes') {
            $class .= 'reverse';
        }

        return $class;
    }

    /**
     * Generates circle line color
     *
     * @param $params
     *
     * @return array
     */

    private function getItemStyleProperties($params) {

        $style                            = array();
        $style['circle_border_color']     = '';
        $style['circle_background_color'] = '';
        $style['line_color']              = '';

        if($params['circle_border_color'] !== '') {
            $style['circle_border_color'] = 'border-color:'.$params['circle_border_color'].';';
        }
        if($params['circle_background_color'] !== '') {
            $style['circle_background_color'] = 'background-color:'.$params['circle_background_color'].';';
            $style['line_color']              = 'background-color:'.$params['circle_background_color'].';';
        }

        return $style;
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorWorkflow() );