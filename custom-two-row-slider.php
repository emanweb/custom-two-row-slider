<?php
/**
 * Plugin Name: Custom Two Row Slider
 * Plugin URI: https://github.com/emanweb/custom-two-row-slider/
 * Description: Custom Two Row Slider is a lightweight WordPress plugin that allows you to create elegant image sliders with two rows of content. Each row displays 4 items, making it perfect for showcasing portfolios, products, or any other content in a grid-like slider format.
 * Version: 1.0.0
 * Author: Emanuel Costa
 * Author URI: https://www.hightechweb.com
 * Text Domain: custom-two-row-slider
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class CustomTwoRowSlider {
    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_shortcode('two_row_slider', array($this, 'render_slider'));
    }

    public function enqueue_scripts() {
        // Enqueue Slick CSS
        wp_enqueue_style(
            'slick-css',
            'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css'
        );
        
        // Enqueue Slick Theme CSS
        wp_enqueue_style(
            'slick-theme-css',
            'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css'
        );

        // Enqueue Slick JS
        wp_enqueue_script(
            'slick-js',
            'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
            array('jquery'),
            '1.8.1',
            true
        );

        // Enqueue custom slider script
        wp_enqueue_script(
            'custom-two-row-slider',
            plugin_dir_url(__FILE__) . 'assets/js/slider.js',
            array('jquery', 'slick-js'),
            '1.0.0',
            true
        );

        // Enqueue custom slider styles
        wp_enqueue_style(
            'custom-two-row-slider',
            plugin_dir_url(__FILE__) . 'assets/css/slider.css',
            array(),
            '1.0.0'
        );
    }

    public function render_slider($atts) {
        $atts = shortcode_atts(array(
            'images' => '',
            'title' => '',
        ), $atts);

        $images = explode(',', $atts['images']);
        $title = $atts['title'];

        ob_start();
        ?>
        <div class="custom-two-row-slider">
            <?php if ($title) : ?>
                <h2 class="slider-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            
            <div class="slider-container">
                <?php foreach ($images as $image_id) : 
                    $image_url = wp_get_attachment_image_url($image_id, 'full');
                    if ($image_url) : ?>
                        <div class="slider-item">
                            <img src="<?php echo esc_url($image_url); ?>" alt="">
                        </div>
                    <?php endif;
                endforeach; ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}

// Initialize the plugin
new CustomTwoRowSlider(); 
