<?php

/**
 * Template Name: About
 */
get_header(); ?>

<main class="main">
    <div class="container">
        <div class="about-layout">
            <div class="avatar">RK</div>
            <div class="about-text">
                <h2><?php _e('WordPress specialist with a product mindset.', 'wpdev-portfolio'); ?></h2>
                <p><?php _e('I partner with founders, agencies, and product teams to turn complex content needs into reliable, scalable WordPress systems. My work blends custom architecture, editor-friendly tooling, and thoughtful performance practices.', 'wpdev-portfolio'); ?></p>
                <p><?php _e('Typical engagements include custom post types, block development, plugin ecosystems, REST API integrations, and performance-focused migrations.', 'wpdev-portfolio'); ?></p>
                <p><?php _e('Based in Kathmandu, available remote worldwide.', 'wpdev-portfolio'); ?></p>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary"><?php _e('Let\'s work together', 'wpdev-portfolio'); ?></a>
            </div>
        </div>

        <div style="margin-top:48px; padding-top:32px; border-top:0.5px solid var(--border);">
            <div class="section-header">
                <div class="eyebrow"><?php _e('Experience', 'wpdev-portfolio'); ?></div>
                <h2><?php _e('Skills &amp; expertise', 'wpdev-portfolio'); ?></h2>
            </div>
            <div style="display:flex; gap:8px; flex-wrap:wrap;">
                <span class="skill-tag">PHP</span>
                <span class="skill-tag">WordPress</span>
                <span class="skill-tag">MySQL</span>
                <span class="skill-tag">REST API</span>
                <span class="skill-tag">ACF</span>
                <span class="skill-tag">WP-CLI</span>
                <span class="skill-tag">JavaScript</span>
                <span class="skill-tag">Block Editor</span>
                <span class="skill-tag">React</span>
                <span class="skill-tag">TypeScript</span>
                <span class="skill-tag">Docker</span>
                <span class="skill-tag">CI/CD</span>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>