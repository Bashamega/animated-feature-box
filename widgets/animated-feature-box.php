<?php
namespace AnimatedFeatureBox;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit;

class Animated_Feature_Box extends Widget_Base {
    
    public function get_name() {
        return 'animated_feature_box';
    }
    
    public function get_title() {
        return __('Animated Feature Box', 'animated-feature-box');
    }
    
    public function get_icon() {
        return 'eicon-animation';
    }
    
    public function get_categories() {
        return ['general'];
    }
    
    protected function register_controls() {
        $this->register_content_controls();
        $this->register_style_controls();
    }

    protected function register_content_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'animated-feature-box'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'icon',
            [
                'label' => __('Icon', 'animated-feature-box'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-graduation-cap',
                    'library' => 'solid',
                ],
            ]
        );
        
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'animated-feature-box'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Feature Title', 'animated-feature-box'),
            ]
        );
        
        $this->add_control(
            'description',
            [
                'label' => __('Description', 'animated-feature-box'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Add your feature description here...', 'animated-feature-box'),
            ]
        );
        
        $this->add_control(
            'link',
            [
                'label' => __('Link', 'animated-feature-box'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'animated-feature-box'),
                'default' => [
                    'url' => '#',
                ],
            ]
        );
        
        $this->end_controls_section();
    }

    protected function register_style_controls() {
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style', 'animated-feature-box'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'icon_color',
            [
                'label' => __('Icon Color', 'animated-feature-box'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-box i' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'animated-feature-box'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-box h4 a' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_control(
            'description_color',
            [
                'label' => __('Description Color', 'animated-feature-box'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-box p' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings = $this->get_settings_for_display();
        include dirname(__FILE__) . '/../templates/feature-box.php';
    }
}