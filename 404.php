<?php get_header(); ?>

<main class="main">
    <div class="container">
        <div class="error-page">
            <span class="error-page__code">404</span>
            <h1><?php _e('Page not found', 'wpdev-portfolio'); ?></h1>
            <p><?php _e('The page you\'re looking for doesn\'t exist or has been moved.', 'wpdev-portfolio'); ?></p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--primary"><?php _e('Back to home', 'wpdev-portfolio'); ?></a>
        </div>
    </div>
</main>

<?php get_footer(); ?>
