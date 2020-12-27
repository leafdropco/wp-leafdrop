<?php

class BridgeCoreElementorVideoBox extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_video_box';
    }

    public function get_title() {
        return esc_html__( 'Qode Video Box', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-video-box';
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
            'video_link',
            [
                'label' => esc_html__('Video Link', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

	    $this->add_control(
		    'video_image',
		    [
			    'label' => esc_html__('Image', 'bridge-core'),
			    'type' => \Elementor\Controls_Manager::MEDIA,
		    ]
	    );

        $this->add_control(
            'disable_hover',
            [
                'label' => esc_html__('Disable Hover Overlay', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => array(
	                'no'    => esc_html__('No/Default', 'bridge-core'),
	                'yes'   => esc_html__('Yes', 'bridge-core')
                )
            ]
        );
	    $this->add_control(
		    'disable_zoom',
		    [
			    'label' => esc_html__('Disable Zoom', 'bridge-core'),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => array(
				    'no'    => esc_html__('No/Default', 'bridge-core'),
				    'yes'   => esc_html__('Yes', 'bridge-core')
			    )
		    ]
	    );

        $this->end_controls_section();


    }

    protected function render(){
        $params = $this->get_settings_for_display();
	    $params['holder_classes']   = $this->getHolderClasses($params);
	    $params['img_src']          =  $this->getImageSrc($params);


	    echo bridge_core_get_shortcode_template_part('templates/video-box-template', 'video-box', '', $params);
    }

	private function getImageSrc($params){

		if( ! empty( $params['video_image'] ) ) {
			$params['video_image'] = $params['video_image']['id'];
		}
		$image_original = wp_get_attachment_image_src($params['video_image'], 'full');
		$img_src = $image_original[0];
		return $img_src;
	}

	private function getHolderClasses($params){
		$holderClasses = array();

		$holderClasses[] = 'qode_video_box';

		if ($params['disable_hover'] == 'yes') {
			$holderClasses[] = 'disabled_hover_overlay';
		}

		if ($params['disable_zoom'] == 'yes') {
			$holderClasses[] = 'disabled_hover_zoom';
		}

		return implode(' ', $holderClasses);
	}

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorVideoBox() );