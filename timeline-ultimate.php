<?php
/**
 * Plugin Name: Timeline Ultimate
 * Plugin URI: https://github.com/craincode/wp-timeline-ultimate
 * Description: Fully responsive and mobile ready facebook style timeline for WordPress.
 * Version: 1.5.0
 * Author: Austin Passy
 * Author URI: https://github.com/thefrosty
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

define('TIMELINE_UM_PLUGIN_URL', WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)) . '/');
define('TIMELINE_UM_PLUGIN_DIR', plugin_dir_path(__FILE__));

// Themes
add_action('plugins_loaded', static function (): void {
    require_once TIMELINE_UM_PLUGIN_DIR . 'includes/timeline-um-meta.php';
    require_once TIMELINE_UM_PLUGIN_DIR . 'includes/timeline-um-functions.php';

    foreach (glob(TIMELINE_UM_PLUGIN_DIR . 'themes/*/index.php') as $filename) {
        require_once $filename;
    }

    add_action('wp_enqueue_scripts', static function (): void {
        global $post;
        wp_register_script('timeline_um', plugins_url('/js/scripts.js', __FILE__), ['jquery']);
        wp_localize_script('timeline_um', 'timelineUltimate', ['ajaxurl' => admin_url('admin-ajax.php')]);

        $themes = [];
        foreach (glob(TIMELINE_UM_PLUGIN_DIR . 'themes/*/style.css') as $filename) {
            preg_match('/themes\/(\w+)\/style/', $filename, $matches);
            $themes[$matches[1]] = plugins_url(str_replace(TIMELINE_UM_PLUGIN_DIR, '', $filename), __FILE__);
            wp_register_style("timeline_um-$matches[1]", esc_url($themes[$matches[1]]));
        }

        if (is_singular() && is_a($post, 'WP_Post') && has_shortcode($post->post_content, 'timeline_um')) {
            if (
                preg_match_all('/' . get_shortcode_regex() . '/s', $post->post_content, $matches) &&
                array_key_exists(2, $matches) &&
                array_key_exists(3, $matches) &&
                in_array('timeline_um', $matches[2], true)
            ) {
                $atts = shortcode_parse_atts($matches[3][0] ?? '');
                $theme = !isset($atts['id']) ? '' : get_post_meta($atts['id'], 'timeline_um_themes', true);
                wp_enqueue_style("timeline_um-$theme");
            }
        }
    });

    add_action('admin_enqueue_scripts', static function (string $hook): void {
        wp_enqueue_style('timeline_um', TIMELINE_UM_PLUGIN_URL . 'css/style.css');

        wp_enqueue_script('ParaAdmin', plugins_url('ParaAdmin/js/ParaAdmin.js', __FILE__), ['jquery']);
        wp_enqueue_script(
            'timeline_um_color_picker',
            plugins_url('/js/color-picker.js', __FILE__),
            ['wp-color-picker'],
            false,
            true
        );

        wp_enqueue_style('ParaAdmin', TIMELINE_UM_PLUGIN_URL . 'ParaAdmin/css/ParaAdmin.css');
    });

    add_shortcode('timeline_um', static function (array $atts): string
    {
        $atts = shortcode_atts([
            'id' => 0,
        ], $atts);

        $post_id = absint($atts['id']);

        $theme = get_post_meta($post_id, 'timeline_um_themes', true);
        wp_enqueue_script('timeline_um');
        wp_enqueue_style("timeline_um-$theme");

        $timeline_um_display = '';

        $function = "timeline_um_body_$theme";
        if (function_exists($function)) {
            $timeline_um_display .= call_user_func($function, $post_id);
        }

        return $timeline_um_display;
    });
});

register_activation_hook(__FILE__, static function (): void {
    if (!is_admin() || !function_exists('get_plugin_data')) {
        return;
    }

    update_option('timeline_um_version', get_plugin_data(__FILE__)['Version']);
});
