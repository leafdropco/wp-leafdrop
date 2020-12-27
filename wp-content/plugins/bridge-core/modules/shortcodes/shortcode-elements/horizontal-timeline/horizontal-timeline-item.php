<?php
namespace Bridge\Shortcodes\HorizontalTimeline;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class HorizontalTimelineItem implements ShortcodeInterface {
    private $base;
	
    public function __construct() {
        $this->base = 'qode_horizontal_timeline_item';
        add_action('vc_before_init', array($this, 'vcMap'));
    }
	
    public function getBase() {
        return $this->base;
    }
	
    public function vcMap() {
	    vc_map(
		    array(
			    'name'            => esc_html__( 'Horizontal Timeline Item', 'bridge-core' ),
			    'base'            => $this->base,
			    'category'        => esc_html__( 'by QODE', 'bridge-core' ),
			    'icon'            => 'icon-wpb-horizontal-timeline-item extended-custom-icon-qode',
			    'as_child'        => array( 'only' => 'qode_horizontal_timeline' ),
			    'as_parent'       => array( 'except' => 'vc_row, vc_accordion' ),
			    'content_element' => true,
			    'js_view'         => 'VcColumnView',
			    'params'          => array(
				    array(
					    'type'       => 'textfield',
					    'param_name' => 'timeline_label',
					    'heading'    => esc_html__( 'Timeline Label', 'bridge-core' )
				    ),
				    array(
					    'type'        => 'textfield',
					    'param_name'  => 'timeline_date',
					    'heading'     => esc_html__( 'Timeline Date', 'bridge-core' ),
					    'description' => esc_html__( 'Enter date in format dd/mm/yyyy.', 'bridge-core' )
				    ),
				    array(
					    'type'       => 'attach_image',
					    'param_name' => 'content_image',
					    'heading'    => esc_html__( 'Content Image', 'bridge-core' )
				    )
			    )
		    )
	    );
    }

    /**
     * Renders HTML for product list shortcode
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'timeline_label' => '2017',
            'timeline_date' => '23/02/2017',
            'content_image' => ''
        );
        $params = shortcode_atts($default_atts, $atts);
	
	    $params['holder_classes'] = $this->getHolderClasses($params);
	    $params['timeline_label'] = !empty($atts['timeline_label']) ? $atts['timeline_label'] : $default_atts['timeline_label'];
	    $params['timeline_date']  = !empty($atts['timeline_date']) ? $atts['timeline_date'] : $default_atts['timeline_date'];
	    $params['content']        = $content;

        $html = bridge_core_get_shortcode_template_part('templates/horizontal-timeline-item','horizontal-timeline', '', $params);

        return $html;
    }

	/**
	 * Generates holder classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getHolderClasses($params) {
		$holderClasses = array();

		$holderClasses[] = ! empty($params['content_image']) ? 'qode-timeline-has-image' : 'qode-timeline-no-image';

		return implode( ' ', $holderClasses );
	}
}