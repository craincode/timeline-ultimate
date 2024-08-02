<?php
/**
 * Plugin Name: Timeline Ultimate
 * Plugin URI: https://github.com/craincode/wp-timeline-ultimate
 * Description: Fully responsive and mobile ready facebook style timeline for WordPress.
 * Version: 1.4.0
 * Author: Austin Passy
 * Author URI: https://github.com/thefrosty
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

define('timeline_um_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)) . '/');
define('timeline_um_plugin_dir', plugin_dir_path(__FILE__));


require_once(plugin_dir_path(__FILE__) . 'includes/timeline-um-meta.php');
require_once(plugin_dir_path(__FILE__) . 'includes/timeline-um-functions.php');


//Themes php files
require_once(plugin_dir_path(__FILE__) . 'themes/flat/index.php');


add_action('wp_enqueue_scripts', function (): void {
    // Style for themes
    wp_enqueue_style('timeline_um-style-flat', timeline_um_plugin_url . 'themes/flat/style.css');
});

add_action('admin_enqueue_scripts', function (): void {
    wp_enqueue_script('timeline_um_js', plugins_url('/js/scripts.js', __FILE__), ['jquery']);
    wp_localize_script('timeline_um_js', 'timeline_um_ajax', ['timeline_um_ajaxurl' => admin_url('admin-ajax.php')]);
    wp_enqueue_style('timeline_um_style', timeline_um_plugin_url . 'css/style.css');

    wp_enqueue_script('ParaAdmin', plugins_url('ParaAdmin/js/ParaAdmin.js', __FILE__), ['jquery']);
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script(
        'timeline_um_color_picker',
        plugins_url('/js/color-picker.js', __FILE__),
        ['wp-color-picker'],
        false,
        true
    );

    // ParaAdmin
    wp_enqueue_style('ParaAdmin', timeline_um_plugin_url . 'ParaAdmin/css/ParaAdmin.css');
    //wp_enqueue_style('ParaIcons', accordions_plugin_url.'ParaAdmin/css/ParaIcons.css');
});


register_activation_hook(__FILE__, 'timeline_um_activation');

function timeline_um_activation(): void
{
    $timeline_um_version = "1.4.0";
    update_option('timeline_um_version', $timeline_um_version); //update plugin version.
}


function timeline_um_display($atts, $content = null)
{
    $atts = shortcode_atts(
        [
            'id' => "",

        ],
        $atts
    );

    $post_id = $atts['id'];

    $timeline_um_themes = get_post_meta($post_id, 'timeline_um_themes', true);

    $timeline_um_display = "";

    if ($timeline_um_themes == "flat") {
        $timeline_um_display .= timeline_um_body_flat($post_id);
    }

    return $timeline_um_display;
}

add_shortcode('timeline_um', 'timeline_um_display');
