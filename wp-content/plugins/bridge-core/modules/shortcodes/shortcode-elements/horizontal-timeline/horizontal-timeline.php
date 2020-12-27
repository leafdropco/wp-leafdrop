<?php
namespace Bridge\Shortcodes\HorizontalTimeline;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class HorizontalTimeline implements ShortcodeInterface {
    private $base;
	
    public function __construct() {
        $this->base = 'qode_horizontal_timeline';
		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
    }
	
    public function getBase() {
        return $this->base;
    }

	public function vcMap() {
		vc_map(
			array(
				'name'            => esc_html__( 'Horizontal Timeline', 'bridge-core' ),
				'base'            => $this->base,
				'category'        => esc_html__( 'by QODE', 'bridge-core' ),
				'icon'            => 'icon-wpb-horizontal-timeline extended-custom-icon-qode',
				'js_view'         => 'VcColumnView',
				'content_element' => true,
				'as_parent'       => array( 'only' => 'qode_horizontal_timeline_item' ),
				'params'          => array(
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__( 'Timeline Position', 'bridge-core' ),
						'param_name' => 'position',
						'value'      => array(
							esc_html__( 'Top', 'bridge-core' )    => 'top',
							esc_html__( 'Bottom', 'bridge-core' ) => 'bottom'
						)
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
            'position' => 'top'
        );
        $params = shortcode_atts($default_atts, $atts);
	
	    $params['timeline_params'] = $this->getTimelineParams( $content );
	    $params['holder_classes']  = $this->getHolderClasses( $params, $default_atts );
	    $params['content']         = $content;
	    
	    $position = !empty($params['position']) ? $params['position'] : $default_atts['position'];
	
        $html = bridge_core_get_shortcode_template_part('templates/horizontal-timeline-'.$position.'-template', 'horizontal-timeline', '', $params);

        return $html;
    }
	
	/**
	 * Generates holder classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getHolderClasses( $params, $default_atts ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['position'] ) ? 'qode-timeline-' . $params['position'] : 'qode-timeline-' . $default_atts['position'];
		
		return implode( ' ', $holderClasses );
	}

    public function getTimelineParams($content) {
        // Extract timeline labels
        preg_match_all('/timeline_label="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);
        $timeline_labels = array();

        if (isset($matches[0])) {
            $timeline_labels = $matches[0];
        }

        $timeline_labels_array = array();

        foreach ($timeline_labels as $label) {
            preg_match('/timeline_label="([^\"]+)"/i', $label[0], $labels_matches, PREG_OFFSET_CAPTURE);
            $timeline_labels_array[] = $labels_matches[1][0];
        }

        // Extract timeline dates

        preg_match_all('/timeline_date="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);
        $timeline_dates = array();

        if (isset($matches[0])) {
            $timeline_dates = $matches[0];
        }

        $timeline_dates_array = array();

        foreach ($timeline_dates as $date) {
            preg_match('/timeline_date="([^\"]+)"/i', $date[0], $date_matches, PREG_OFFSET_CAPTURE);
            $timeline_dates_array[] = $date_matches[1][0];
        }

        if(sizeof($timeline_dates_array) == 0) {
            for($i = 0; $i < sizeof($timeline_labels_array); $i++) {
                $timeline_dates_array[] = $i;
            }
        } else if( sizeof(($timeline_dates_array)) < sizeof($timeline_labels_array) ) {
            for ($i = 1; $i <= (sizeof($timeline_labels_array) - sizeof($timeline_dates_array)); $i++) {
                $day = sprintf('%02d', $i);
                $timeline_dates_array[] = $day . '/' . date('m') . '/' . date('Y');
            }
        }

        $timeline_params = array_combine($timeline_dates_array, $timeline_labels_array);

        return $timeline_params;
    }
}