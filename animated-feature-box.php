<?php
/*
Plugin Name: Animated Feature Box
Description: Beautiful animated feature boxes for Elementor
Version: 1.0
Author: Adam Basha
*/

if (!defined('ABSPATH')) exit;

final class Animated_Feature_Box_Plugin {
    
    const VERSION = '1.0.0';
    const MINIMUM_ELEMENTOR_VERSION = '3.0.0';
    const MINIMUM_PHP_VERSION = '7.0';
    
    private static $_instance = null;
    
    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public function __construct() {
        add_action('plugins_loaded', [$this, 'init']);
    }
    
    public function init() {
        // Check if Elementor installed and activated
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_elementor']);
            return;
        }
        
        // Check for required Elementor version
        if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
            return;
        }
        
        // Check for required PHP version
        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
            return;
        }
        
        // Register Widget
        add_action('elementor/widgets/register', [$this, 'register_widgets']);
        
        // Register Styles
        add_action('elementor/frontend/after_enqueue_styles', [$this, 'register_styles']);
    }
    
    public function register_widgets($widgets_manager) {
        require_once(__DIR__ . '/widgets/animated-feature-box.php');
        $widgets_manager->register(new \AnimatedFeatureBox\Animated_Feature_Box());
    }
    
    public function register_styles() {
        wp_enqueue_style(
            'animated-feature-box-animations',
            plugins_url('/assets/css/animations.css', __FILE__)
        );
        wp_enqueue_style(
            'animated-feature-box-styles',
            plugins_url('/assets/css/feature-box.css', __FILE__)
        );
    }
    
    public function admin_notice_missing_elementor() {
        if (isset($_GET['activate'])) unset($_GET['activate']);
        
        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'animated-feature-box'),
            '<strong>' . esc_html__('Animated Feature Box', 'animated-feature-box') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'animated-feature-box') . '</strong>'
        );
        
        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }
    
    public function admin_notice_minimum_elementor_version() {
        if (isset($_GET['activate'])) unset($_GET['activate']);
        
        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'animated-feature-box'),
            '<strong>' . esc_html__('Animated Feature Box', 'animated-feature-box') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'animated-feature-box') . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );
        
        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }
    
    public function admin_notice_minimum_php_version() {
        if (isset($_GET['activate'])) unset($_GET['activate']);
        
        $message = sprintf(
            esc_html__('"%1$s" requires PHP version %2$s or greater.', 'animated-feature-box'),
            '<strong>' . esc_html__('Animated Feature Box', 'animated-feature-box') . '</strong>',
            self::MINIMUM_PHP_VERSION
        );
        
        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }
}

Animated_Feature_Box_Plugin::instance();