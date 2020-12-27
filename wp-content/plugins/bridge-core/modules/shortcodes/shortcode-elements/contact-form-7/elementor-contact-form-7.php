<?php

if( bridge_core_is_installed('contact-form-7') ){
    class BridgeCoreContactForm7 extends \Elementor\Widget_Base{
        public function get_name() {
            return 'bridge_cf_7';
        }

        public function get_title() {
            return esc_html__( 'Qode Contact Form 7', 'bridge-core' );
        }

        public function get_icon() {
            return 'bridge-elementor-custom-icon bridge-elementor-contact-form-7';
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
                'cf7',
                [
                    'label' => esc_html__( 'Select Contact Form', 'void' ),
                    'description' => esc_html__('You need to install and activate Contact Form 7 plugin','bridge-core'),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => false,
                    'label_block' => 1,
                    'options' => $this->get_contact_form_7_posts(),
                ]
            );

            $this->add_control(
                'html_class',
                [
                    'label' => esc_html__( 'Select Contact Form Style', 'void' ),
                    'description' => esc_html__('Contact form 7 - plugin must be installed and there must be some contact forms made with the contact form 7','void'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'default' => esc_html__('Default', 'bridge-core'),
                        'cf7_custom_style_1' => esc_html__('Custom Style 1', 'bridge-core'),
                        'cf7_custom_style_2' => esc_html__('Custom Style 2', 'bridge-core'),
                        'cf7_custom_style_3' => esc_html__('Custom Style 3', 'bridge-core'),
                    ],
                ]
            );

            $this->end_controls_section();

        }

        protected function render(){
            static $counter = 0;

            $params = $this->get_settings_for_display();
            $params['counter'] = $counter;

            echo bridge_core_get_shortcode_template_part('templates/contact-form-7', 'contact-form-7', '', $params);

            $counter++;
        }

        protected function get_contact_form_7_posts(){
            $args = array(
                'post_type' => 'wpcf7_contact_form',
                'posts_per_page' => -1
            );

            $category_list = [];

            if ($categories = get_posts($args)) {
                foreach ($categories as $category) {
                    (int)$category_list[$category->ID] = $category->post_title;
                }
            } else {
                (int)$category_list['0'] = esc_html__('No contect From 7 form found', 'void');
            }
            return $category_list;
        }
    }

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreContactForm7() );
}