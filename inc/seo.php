<?php
defined('ABSPATH') || exit;

function wpdev_seo_meta_tags()
{
    if (is_admin()) {
        return;
    }

    $site_name = get_bloginfo('name');
    $tagline = get_bloginfo('description');
    $name = 'Rukmagat Kandel';
    $production_url = 'https://rukmagatkandel.com.np';

    if (is_front_page()) {
        $title = $site_name;
        $description = $tagline;
        $url = home_url('/');
        $type = 'website';
    } elseif (is_singular()) {
        $title = single_post_title('', false) . ' - ' . $site_name;
        $description = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 30);
        $url = get_permalink();
        $type = 'article';
    } elseif (is_archive()) {
        $title = get_the_archive_title() . ' - ' . $site_name;
        $description = $tagline;
        $url = get_post_type_archive_link(get_post_type()) ?: home_url('/');
        $type = 'website';
    } else {
        $title = wp_get_document_title();
        $description = $tagline;
        $url = home_url('/');
        $type = 'website';
    }

    $meta_description = $description ?: 'Rukmagat Kandel – WordPress developer based in Kathmandu. Custom themes, plugins, and headless WordPress architectures.';

    $canonical = is_front_page() ? $production_url : $url;
?>
    <meta name="description" content="<?php echo esc_attr($meta_description); ?>">
<?php if (is_front_page()) : ?>
    <meta name="keywords" content="WordPress Developer, Rukmagat Kandel, WordPress Themes, WordPress Plugins, Headless WordPress, Kathmandu WordPress Developer">
<?php endif; ?>
    <link rel="canonical" href="<?php echo esc_url($canonical); ?>">

    <meta property="og:title" content="<?php echo esc_attr($title); ?>">
    <meta property="og:description" content="<?php echo esc_attr($meta_description); ?>">
    <meta property="og:url" content="<?php echo esc_url($canonical); ?>">
    <meta property="og:type" content="<?php echo esc_attr($type); ?>">
    <meta property="og:site_name" content="<?php echo esc_attr($site_name); ?>">
    <meta property="og:locale" content="en_US">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?php echo esc_attr($title); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($meta_description); ?>">

<?php if (is_front_page()) : ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {
                "@type": "Person",
                "name": "Rukmagat Kandel",
                "jobTitle": "WordPress Developer",
                "url": "<?php echo esc_url($production_url); ?>",
                "sameAs": [
                    "https://github.com/sunder55",
                    "https://www.linkedin.com/in/rukmagat-kandel-75b302247/"
                ],
                "knowsAbout": ["WordPress", "PHP", "JavaScript", "MySQL", "WooCommerce", "REST API", "ACF", "WP-CLI"]
            },
            {
                "@type": "WebSite",
                "name": "<?php echo esc_attr($site_name); ?>",
                "url": "<?php echo esc_url($production_url); ?>",
                "description": "<?php echo esc_attr($description); ?>"
            }
        ]
    }
    </script>
<?php endif; ?>
}
add_action('wp_head', 'wpdev_seo_meta_tags', 1);
