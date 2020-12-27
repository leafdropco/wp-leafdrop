<?php
namespace Bridge\Shortcodes\VideoBox;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class VideoBox implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     * Sets base attribute and registers shortcode with Visual Composer
     */
    public function __construct() {
        $this->base = 'qode_video_box';
        add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
    }

    /**
     * Returns base attribute
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name' => esc_html__('Qode Video Box', 'bridge-core'),
            'base' => 'qode_video_box',
            'category' => esc_html__('by QODE', 'bridge-core'),
            'icon' => 'extended-custom-icon-qode icon-wpb-video-box',
            'params' => array(
                array(
                    "type" => "textfield",
                    "heading" => esc_html__('Video Link', 'bridge-core'),
                    "param_name" => "video_link"
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__('Image', 'bridge-core'),
                    "param_name" => "video_image"
                ),
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__('Disable Hover Overlay', 'bridge-core'),
                    "param_name" => "disable_hover",
                    "description"   => esc_html__('Enable this option if you want to disable hover overlay', 'bridge-core'),
                    "value" => array(
                        esc_html__('No/Default', 'bridge-core')    => 'no',
                        esc_html__('Yes', 'bridge-core')   => 'yes'
                    )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__('Disable Zoom', 'bridge-core'),
                    "param_name" => "disable_zoom",
                    "value" => array(
                        esc_html__('No/Default', 'bridge-core')    => 'no',
                        esc_html__('Yes', 'bridge-core')   => 'yes'
                    )
                )
            )
        ) );
    }

    /**
     * Renders HTML for video shortcode
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {

        $args = array(
            "video_link" => "",
            "video_image" => "",
            "disable_hover" => "no",
            "disable_zoom"  => "no"
        );

        $params = shortcode_atts($args, $atts);

        extract($params);

        $params['img_src'] = $this->getImageSrc($params);
        $params['holder_classes'] = $this->getHolderClasses($params);

        $html = bridge_core_get_shortcode_template_part('templates/video-box-template', 'video-box', '', $params);

        return $html;
    }

    public function getImageSrc($params){
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