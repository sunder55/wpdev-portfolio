<!doctype html>
<html <?php language_attributes(); ?> data-theme="<?php echo isset($_COOKIE['wpdev_theme']) && $_COOKIE['wpdev_theme'] === 'dark' ? 'dark' : 'light'; ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="page" class="site">

        <header class="site-header">
            <div class="header-inner">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" aria-label="rukmagat">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="site-logo__img" aria-hidden="true">
                        <rect x="2" y="2" width="6" height="18" rx="1.5" fill="var(--logo-fill, #1a1a18)" />
                        <rect x="2" y="2" width="16" height="5" rx="1.5" fill="var(--logo-fill, #1a1a18)" />
                        <rect x="12" y="2" width="6" height="10" rx="1.5" fill="var(--logo-fill, #1a1a18)" />
                        <rect x="2" y="11" width="16" height="4" rx="1.5" fill="var(--logo-fill, #1a1a18)" />
                        <line x1="14" y1="15" x2="22" y2="23" stroke="var(--logo-accent, #0F6E56)" stroke-width="3" stroke-linecap="round" />
                    </svg>
                    <!-- rukmagat -->
                </a>
                <div class="nav-primary">
                    <nav>
                        <?php
                        if (has_nav_menu('primary')) {
                            wp_nav_menu([
                                'theme_location' => 'primary',
                                'container' => false,
                                'menu_class' => 'nav-list',
                                'depth' => 1,
                                'fallback_cb' => false,
                            ]);
                        } else {
                            $current_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                            $home_url_path = parse_url(home_url('/'), PHP_URL_PATH);
                        ?>
                            <ul class="nav-list">
                                <li class="<?php echo $current_path === $home_url_path ? 'current-menu-item' : ''; ?>"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                                <li class="<?php echo strpos($current_path, '/projects') === 0 ? 'current-menu-item' : ''; ?>"><a href="<?php echo esc_url(home_url('/projects/')); ?>">Projects</a></li>
                                <li class="<?php echo strpos($current_path, '/about') === 0 ? 'current-menu-item' : ''; ?>"><a href="<?php echo esc_url(home_url('/about/')); ?>">About</a></li>
                                <li class="<?php echo strpos($current_path, '/contact') === 0 ? 'current-menu-item' : ''; ?>"><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
                            </ul>
                        <?php } ?>
                    </nav>
                    <button class="theme-toggle" aria-label="Toggle theme">
                        <span class="theme-icon"><?php echo (isset($_COOKIE['wpdev_theme']) && $_COOKIE['wpdev_theme'] === 'dark') ? '☀️' : '🌙'; ?></span>
                    </button>
                    <button class="menu-toggle" aria-label="Toggle menu">
                        <span></span><span></span><span></span>
                    </button>
                </div>
            </div>
        </header>