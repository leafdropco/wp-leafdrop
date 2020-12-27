<?php
namespace Bridge\Shortcodes\WorkflowItem;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

/**
 * class Workflow
 */
class WorkflowItem implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    function __construct() {
        $this->base = 'qode_workflow_item';
        add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {

        vc_map(array(
            "name"                    => esc_html__('Workflow Item', 'bridge-core'),
            "base"                    => $this->base,
            "as_child"                => array('only' => 'qode_workflow'),
            'category'                => esc_html__('by QODE', 'bridge-core'),
            "icon"                    => "icon-wpb-workflow-item extended-custom-icon-qode",
            "show_settings_on_create" => true,
            'params'                  => array_merge(
                array(
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Title', 'bridge-core'),
                        'param_name'  => 'title',
                        'admin_label' => true,
                        'description' => esc_html__('Enter workflow item title.', 'bridge-core')
                    ),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__('Title Tag', 'bridge-core'),
						'param_name'	=> 'title_tag',
						'value' => array(
							'' => '',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6',
						),
						'group'			=> esc_html__('Design Group', 'bridge-core')
					),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Subtitle', 'bridge-core'),
                        'param_name'  => 'subtitle',
                        'admin_label' => true,
                        'description' => esc_html__('Enter workflow item subtitle.', 'bridge-core')
                    ),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__('Subtitle Tag', 'bridge-core'),
						'param_name'	=> 'subtitle_tag',
						'value' => array(
							'' => '',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6',
						),
						'group'			=> esc_html__('Design Group', 'bridge-core')
					),
                    array(
                        'type'        => 'textarea',
                        'heading'     => esc_html__('Text', 'bridge-core'),
                        'param_name'  => 'text',
                        'description' => esc_html__('Enter workflow item text.', 'bridge-core')
                    ),
                    array(
                        'type'        => 'attach_image',
                        'heading'     => esc_html__('Image', 'bridge-core'),
                        'param_name'  => 'image',
                        'description' => esc_html__('Insert workflow item image.', 'bridge-core')
                    ),
                    array(
                        'type'        => 'checkbox',
                        'heading'     => esc_html__('Set image on right side', 'bridge-core'),
                        'param_name'  => 'image_float',
                        'value'       => array('Make Image Float Right?' => 'yes'),
                        'description' => ''
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Image alignment', 'bridge-core'),
                        'param_name'  => 'image_alignment',
                        'admin_label' => true,
                        'value'       => array(
                            esc_html__('Center', 'bridge-core') => 'center',
                            esc_html__('Left', 'bridge-core')   => 'left',
                            esc_html__('Right', 'bridge-core')  => 'right'
                        )
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Circle border color', 'bridge-core'),
                        'param_name'  => 'circle_border_color',
                        'description' => esc_html__('Pick a color for the circle border color.', 'bridge-core'),
						'group'		  => esc_html__('Design Group', 'bridge-core')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Circle background color', 'bridge-core'),
                        'param_name'  => 'circle_background_color',
                        'description' => esc_html__('Pick a color for the circle background color.', 'bridge-core'),
						'group'		  => esc_html__('Design Group', 'bridge-core')
                    ),
                )
            )
        ));
    }

    public function render($atts, $content = null) {
        $default_atts = (array(
            'title'                   => '',
            'title_tag'				  => 'h3',
            'subtitle'                => '',
            'subtitle_tag'			  => 'h6',
            'text'                    => '',
            'image'                   => '',
            'image_float'             => '',
            'image_alignment'         => 'center',
            'circle_border_color'     => '',
            'circle_background_color' => '',
        ));
        $params       = shortcode_atts($default_atts, $atts);
        $style_params = $this->getStyleProperties($params);
        $params       = array_merge($params, $style_params);
        extract($params);

        $params['image_on_right_class'] = $this->imageOnRightSideClass($params);

        $output = '';
        $output .= bridge_core_get_shortcode_template_part('templates/workflow-item-template', 'workflow', '', $params);

        return $output;
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

    private function getStyleProperties($params) {

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
