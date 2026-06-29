<?php
defined('ABSPATH') || exit;

function wpdev_seo_meta_tags()
{
    if (is_front_page() || is_home()) {
        $title = __('Rukmagat Kandel — WordPress Developer', 'wpdev-portfolio');
        $desc = __('WordPress Developer specializing in custom themes, headless architectures, and plugin ecosystems for agencies and product teams. Based in Kathmandu, available worldwide.', 'wpdev-portfolio');
    } elseif (is_singular()) {
        $title = single_post_title('', false) . ' — ' . get_bloginfo('name');
        $desc = get_the_excerpt() ?: wp_trim_words(get_the_content(), 30);
    } elseif (is_post_type_archive('projects')) {
        $title = __('Portfolio — Rukmagat Kandel, WordPress Developer', 'wpdev-portfolio');
        $desc = __('WordPress builds, custom plugins, and web solutions by Rukmagat Kandel.', 'wpdev-portfolio');
    } elseif (is_page()) {
        $title = single_post_title('', false) . ' — ' . get_bloginfo('name');
        $desc = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true) ?: '';
    } elseif (is_search()) {
        $title = sprintf(__('Search: %s', 'wpdev-portfolio'), get_search_query());
        $desc = __('Search results', 'wpdev-portfolio');
    } elseif (is_404()) {
        $title = __('Page Not Found', 'wpdev-portfolio');
        $desc = __('The page you are looking for does not exist.', 'wpdev-portfolio');
    } else {
        $title = wp_get_document_title();
        $desc = get_bloginfo('description');
    }

    if (empty($desc)) {
        $desc = get_bloginfo('description');
    }

    $url = is_singular() ? get_permalink() : home_url(add_query_arg([], $_SERVER['REQUEST_URI']));
    $image = '';
    if (is_singular() && has_post_thumbnail()) {
        $image = get_the_post_thumbnail_url(null, 'large');
    }
    if (empty($image)) {
        $image = get_template_directory_uri() . '/image.png';
    }

    echo "\t<meta name=\"description\" content=\"" . esc_attr($desc) . "\">\n";
    echo "\t<meta property=\"og:title\" content=\"" . esc_attr($title) . "\">\n";
    echo "\t<meta property=\"og:description\" content=\"" . esc_attr($desc) . "\">\n";
    echo "\t<meta property=\"og:url\" content=\"" . esc_url($url) . "\">\n";
    echo "\t<meta property=\"og:type\" content=\"" . (is_singular('post') ? 'article' : 'website') . "\">\n";
    echo "\t<meta property=\"og:locale\" content=\"" . esc_attr(get_locale()) . "\">\n";
    echo "\t<meta property=\"og:site_name\" content=\"" . esc_attr(get_bloginfo('name')) . "\">\n";
    echo "\t<meta property=\"og:image\" content=\"" . esc_url($image) . "\">\n";
    echo "\t<meta name=\"twitter:card\" content=\"summary_large_image\">\n";
    echo "\t<meta name=\"twitter:title\" content=\"" . esc_attr($title) . "\">\n";
    echo "\t<meta name=\"twitter:description\" content=\"" . esc_attr($desc) . "\">\n";
    echo "\t<link rel=\"canonical\" href=\"" . esc_url($url) . "\">\n";
}
add_action('wp_head', 'wpdev_seo_meta_tags', 1);

function wpdev_seo_json_ld()
{
    if (!is_front_page()) {
        return;
    }

    $data = [
        '@context' => 'https://schema.org',
        '@type' => 'Person',
        'name' => 'Rukmagat Kandel',
        'givenName' => 'Rukmagat',
        'familyName' => 'Kandel',
        'jobTitle' => ['WordPress Developer', 'Web Developer'],
        'url' => home_url('/'),
        'sameAs' => [
            'https://github.com/sunder55',
            'https://www.linkedin.com/in/rukmagat-kandel-75b302247/',
        ],
        'knowsAbout' => ['WordPress', 'PHP', 'Web Development', 'MySQL', 'REST API', 'JavaScript'],
        'description' => get_bloginfo('description'),
    ];
    echo "\t<script type=\"application/ld+json\">\n";
    echo "\t" . wp_json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . "\n";
    echo "\t</script>\n";
}
add_action('wp_head', 'wpdev_seo_json_ld', 2);
