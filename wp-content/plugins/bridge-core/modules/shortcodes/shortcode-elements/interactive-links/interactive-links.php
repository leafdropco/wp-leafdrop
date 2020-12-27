<?php
namespace Bridge\Shortcodes\InteractiveLinks;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class InteractiveLinks implements ShortcodeInterface{
    private $base;

    public function __construct() {
        $this->base = 'qode_interactive_links';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name' => esc_html__('Interactive Links', 'bridge-core'),
            'base' => 'qode_interactive_links',
            'category' => esc_html__('by QODE', 'bridge-core'),
            'icon' => 'extended-custom-icon-qode icon-wpb-interactive-links',
            'params' => array(
                array(
                    'type'        => 'dropdown',
                    'param_name'  => 'type',
                    'heading'     => esc_html__( 'Layout', 'bridge-core' ),
                    'description' => esc_html__( 'Choose desired layout', 'bridge-core' ),
                    'value'       => array(
                        esc_html__('Links below', 'bridge-core') => 'links-below',
                        esc_html__('Links aside', 'bridge-core') => 'links-aside',
                    )
                ),
                array(
                    'type'        => 'dropdown',
                    'param_name'  => 'title_tag',
                    'heading'     => esc_html__( 'Title Tag', 'bridge-core' ),
                    'description' => esc_html__( 'Choose title tag for titles', 'bridge-core' ),
                    'value'       => array_flip(bridge_qode_get_title_tag(true))
                ),
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__( 'Interactive Link Items', 'bridge-core' ),
                    'param_name' => 'interactive_links',
                    'value' => '',
                    'params' => array(
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__( 'Item Title', 'bridge-core' ),
                            'param_name' => 'item_title',
                        ),
                        array(
                            'type' => 'attach_image',
                            'heading' => esc_html__( 'Item Image', 'bridge-core' ),
                            'param_name' => 'item_image',
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__( 'Item Link', 'bridge-core' ),
                            'param_name' => 'item_link',
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__( 'Item Link Target', 'bridge-core' ),
                            'param_name' => 'item_link_target',
                            'value' => array_flip(bridge_qode_get_link_target_array(false))
                        )
                    )
                ),
                array(
                    'type'        => 'dropdown',
                    'param_name'  => 'widget_area',
                    'heading'     => esc_html__( 'Widget Area', 'bridge-core' ),
                    'value'       => array_merge(
                        array(
                            '' => ''
                        ),
                        array_flip(bridge_qode_get_custom_sidebars())
                    ),
                    'description' => esc_html__( 'Choose a widget area to be rendered at the bottom right of the shortcode.', 'bridge-core' )
                )
            )
        ) );
    }

    public function render($atts, $content = null) {
        $args = array(
            'type' => 'links-below',
            'title_tag' => 'h3',
            'interactive_links' => '',
            'widget_area' => ''
        );

        $params = shortcode_atts($args, $atts);

        $params['interactive_links'] = json_decode(urldecode($params['interactive_links']), true);
        $params['holder_classes'] = $this->getHolderClasses($params);

        $html = bridge_core_get_shortcode_template_part('templates/interactive-links-' . $params['type'], 'interactive-links', '', $params);

        return $html;
    }

    private function getHolderClasses($params) {
        $classes = array(
            'qode-interactive-links'
        );

        if (!empty($params['type'])) {
            $classes[] = 'qode-il-' . $params['type'];
        }

        return implode(' ', $classes);
    }
}