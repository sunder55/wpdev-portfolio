<?php
defined('ABSPATH') || exit;

require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/custom-post-types.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/contact.php';
require_once get_template_directory() . '/inc/seo.php';

function wpdev_get_field($field_name, $post_id = null)
{
    $post_id = $post_id ?: get_the_ID();
    $value = get_post_meta($post_id, $field_name, true);
    return $value !== '' ? $value : null;
}
