<?php
defined('ABSPATH') || exit;

function wpdev_handle_contact()
{
    check_ajax_referer('wpdev_nonce', 'nonce');

    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    if (!$name || !$email || !$message) {
        wp_send_json_error(['message' => 'Please fill in all fields.']);
    }

    $to = get_option('admin_email');
    $subject = sprintf('[Portfolio] Message from %s', $name);
    $body = "Name: $name\nEmail: $email\n\n$message";
    $headers = ['Content-Type: text/plain; charset=UTF-8', "Reply-To: $email"];

    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success(['message' => 'Thanks! Your message has been sent.']);
    } else {
        wp_send_json_error(['message' => 'Failed to send. Please try again.']);
    }
}
add_action('wp_ajax_wpdev_contact', 'wpdev_handle_contact');
add_action('wp_ajax_nopriv_wpdev_contact', 'wpdev_handle_contact');
