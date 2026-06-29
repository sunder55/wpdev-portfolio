<?php
defined('ABSPATH') || exit;

require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/custom-post-types.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/contact.php';
require_once get_template_directory() . '/inc/seo.php';

function wpdev_custom_document_title($title)
{
    if (is_front_page()) {
        $title['title'] = get_bloginfo('name');
        unset($title['tagline']);
    }
    return $title;
}
add_filter('document_title_parts', 'wpdev_custom_document_title');

function wpdev_document_title_separator($sep)
{
    return ' - ';
}
add_filter('document_title_separator', 'wpdev_document_title_separator');

function wpdev_get_field($field_name, $post_id = null)
{
    $post_id = $post_id ?: get_the_ID();
    $value = get_post_meta($post_id, $field_name, true);
    return $value !== '' ? $value : null;
}
