<?php
defined('ABSPATH') || exit;

function wpdev_enqueue_assets()
{
    $theme = wp_get_theme();
    $version = time();

    wp_enqueue_style('wpdev-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', [], null);
    wp_enqueue_style('wpdev-theme', get_template_directory_uri() . '/assets/css/theme.css', ['wpdev-fonts'], $version);
    wp_enqueue_script('wpdev-theme', get_template_directory_uri() . '/assets/js/theme.js', [], $version, true);

    wp_localize_script('wpdev-theme', 'wpdevData', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('wpdev_nonce'),
        'restUrl' => esc_url_raw(rest_url()),
    ]);
}
add_action('wp_enqueue_scripts', 'wpdev_enqueue_assets');
