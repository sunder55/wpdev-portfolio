<?php
defined('ABSPATH') || exit;

function wpdev_setup()
{
    load_theme_textdomain('wpdev-portfolio', get_template_directory() . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');

    set_post_thumbnail_size(1200, 675, true);
    add_image_size('wpdev-card', 760, 500, true);

    register_nav_menus(['primary' => __('Primary Menu', 'wpdev-portfolio')]);
}
add_action('after_setup_theme', 'wpdev_setup');
