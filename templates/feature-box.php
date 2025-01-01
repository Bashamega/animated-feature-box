<?php
if (!defined('ABSPATH')) exit;
?>
<div class="wow zoomIn" style="visibility: visible; animation-name: zoomIn;">

    <div class="feature-box mb-md-3">
		<a href="<?php echo esc_url($settings['link']['url']); ?>"                <?php echo $settings['link']['is_external'] ? 'target="_blank"' : ''; ?>
               <?php echo $settings['link']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
            <?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?>
            <h4>

                <?php echo esc_html($settings['title']); ?>
            </h4>
            <p><?php echo esc_html($settings['description']); ?></p>
		</a>

    </div>
</div>
