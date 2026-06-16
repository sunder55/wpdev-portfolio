<?php
defined('ABSPATH') || exit;

function wpdev_register_project_post_type()
{
    $labels = [
        'name' => __('Projects', 'wpdev-portfolio'),
        'singular_name' => __('Project', 'wpdev-portfolio'),
        'add_new' => __('Add Project', 'wpdev-portfolio'),
        'add_new_item' => __('Add New Project', 'wpdev-portfolio'),
        'edit_item' => __('Edit Project', 'wpdev-portfolio'),
        'view_item' => __('View Project', 'wpdev-portfolio'),
    ];

    register_post_type('projects', [
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'],
        'rewrite' => ['slug' => 'projects'],
        'has_archive' => true,
        'menu_position' => 5,
    ]);

    register_taxonomy('project_type', 'projects', [
        'label' => __('Project Types', 'wpdev-portfolio'),
        'public' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite' => ['slug' => 'project-type'],
    ]);

    register_taxonomy('project_stack', 'projects', [
        'label' => __('Tech Stack', 'wpdev-portfolio'),
        'public' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'hierarchical' => false,
        'rewrite' => ['slug' => 'tech-stack'],
    ]);
}
add_action('init', 'wpdev_register_project_post_type');

function wpdev_register_project_meta()
{
    $meta = [
        'wpdev_project_type' => ['type' => 'string', 'default' => ''],
        'wpdev_project_role' => ['type' => 'string', 'default' => ''],
        'wpdev_live_url' => ['type' => 'string', 'default' => ''],
        'wpdev_github_url' => ['type' => 'string', 'default' => ''],
        'wpdev_tech_stack' => ['type' => 'string', 'default' => ''],
    ];

    foreach ($meta as $key => $args) {
        register_post_meta('projects', $key, [
            'show_in_rest' => true,
            'single' => true,
            'type' => $args['type'],
            'default' => $args['default'],
            'auth_callback' => '__return_true',
        ]);
    }
}
add_action('init', 'wpdev_register_project_meta');

function wpdev_add_project_meta_boxes()
{
    add_meta_box(
        'wpdev_project_details',
        __('Project Details', 'wpdev-portfolio'),
        'wpdev_project_details_callback',
        'projects',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'wpdev_add_project_meta_boxes');

function wpdev_project_details_callback($post)
{
    wp_nonce_field('wpdev_project_details', 'wpdev_project_details_nonce');

    $fields = [
        'wpdev_project_role' => __('Your Role', 'wpdev-portfolio'),
        'wpdev_live_url' => __('Live URL', 'wpdev-portfolio'),
        'wpdev_github_url' => __('GitHub URL', 'wpdev-portfolio'),
        'wpdev_tech_stack' => __('Tech Stack (comma separated)', 'wpdev-portfolio'),
    ];

    echo '<table style="width:100%;border-collapse:collapse;">';
    foreach ($fields as $key => $label) {
        $value = get_post_meta($post->ID, $key, true);
        echo '<tr>';
        echo '<td style="padding:8px 12px 8px 0;width:200px;"><label for="' . esc_attr($key) . '"><strong>' . esc_html($label) . '</strong></label></td>';
        echo '<td style="padding:8px 0;"><input type="text" id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" value="' . esc_attr($value) . '" style="width:100%;padding:6px 8px;"></td>';
        echo '</tr>';
    }
    echo '</table>';
}

function wpdev_save_project_details($post_id)
{
    if (!isset($_POST['wpdev_project_details_nonce']) || !wp_verify_nonce($_POST['wpdev_project_details_nonce'], 'wpdev_project_details')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = ['wpdev_project_role', 'wpdev_live_url', 'wpdev_github_url', 'wpdev_tech_stack'];
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'wpdev_save_project_details');
