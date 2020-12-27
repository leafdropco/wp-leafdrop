<?php

class BridgeCoreElementorFullscreenSection extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_fullscreen_sections';
    }

    public function get_title() {
        return esc_html__( 'Fullscreen Sections', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-fullscreen-sections';
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

        $repeater = new \Elementor\Repeater();

        bridge_core_generate_elementor_templates_control( $repeater );

        $this->add_control(
            'fullscreen_section_items',
            [
                'label' => esc_html__( 'Fullscreen Section Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__('Fullscreen Section Item'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $bridge_qode_options = bridge_qode_return_global_options(); ?>

        <div class="full_screen_preloader"><div class="ajax_loader"><div class="ajax_loader_1"><?php echo bridge_qode_loading_spinners(true); ?></div></div></div>

        <div class="full_screen_holder">
            <?php if (!isset($bridge_qode_options['fss_navigation_button_position']) || $bridge_qode_options['fss_navigation_button_position'] !== 'side_by_side'){?>
                <div class="full_screen_navigation_holder up_arrow"><div class="full_screen_navigation_inner"><a id="up_fs_button" href="#" target="_self"><i class='fa fa-angle-up'></i></a></div></div>
            <?php } ?>
                <div class="full_screen_inner">

                    <?php foreach ( $params['fullscreen_section_items'] as $fullscreen_section_item ) {
                        $fullscreen_section_item['content'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display($fullscreen_section_item['template_id']);
                        echo bridge_core_get_shortcode_template_part('templates/fullscreen-section-item', '_fullscreen-sections-e', '', $fullscreen_section_item);
                    } ?>

                </div>
                <?php if (!isset($bridge_qode_options['fss_navigation_button_position']) || $bridge_qode_options['fss_navigation_button_position'] !== 'side_by_side'){?>
                    <div class="full_screen_navigation_holder down_arrow"><div class="full_screen_navigation_inner"><a id="down_fs_button" href="#" target="_self"><i class='fa fa-angle-down'></i></a></div></div>
                <?php } ?>

                <?php if (isset($bridge_qode_options['fss_navigation_button_position']) && $bridge_qode_options['fss_navigation_button_position'] == 'side_by_side'){?>
                    <div class="full_screen_navigation_holder side_by_side">
                        <div class="full_screen_navigation_inner up_arrow"><a id="up_fs_button" href="#" target="_self"><i class='fa fa-angle-up'></i></a></div>
                        <div class="full_screen_navigation_inner down_arrow"><a id="down_fs_button" href="#" target="_self"><i class='fa fa-angle-down'></i></a></div>
                    </div>
                <?php } ?>
        </div>

        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorFullscreenSection() );