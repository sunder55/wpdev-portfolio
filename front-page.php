<?php get_header(); ?>

<main class="main">

    <!-- Hero -->
    <section class="hero">
        <div class="container">
            <div class="hero-layout">
                <div>
                    <h1 class="hero-title"><?php _e('Hi, I\'m Rukmagat Kandel', 'wpdev-portfolio'); ?></h1>
                    <div class="hero-sub"><?php _e('I build WordPress systems that scale.', 'wpdev-portfolio'); ?></div>
                    <div class="hero-desc"><?php _e('Custom themes, headless architectures, and plugin ecosystems for agencies and product teams.', 'wpdev-portfolio'); ?></div>
                    <div class="btn-row">
                        <a href="<?php echo esc_url(home_url('/projects/')); ?>" class="btn btn--outline"><?php _e('View my work', 'wpdev-portfolio'); ?></a>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary"><?php _e('Get in touch', 'wpdev-portfolio'); ?></a>
                    </div>
                </div>
                <div class="terminal">
                    <div class="term-bar">
                        <span class="term-dot" style="background:#E24B4A"></span>
                        <span class="term-dot" style="background:#EF9F27"></span>
                        <span class="term-dot" style="background:#639922"></span>
                        <span class="term-title">terminal</span>
                    </div>
                    <div class="term-line"><span class="prompt">$</span> <span class="cmd">whoami</span></div>
                    <div class="term-line muted" style="padding-left:12px;">rukmagatkandel</div>
                    <div class="term-line" style="margin-top:6px;"><span class="prompt">$</span> <span class="cmd">cat skills.txt</span></div>
                    <div class="term-line muted" style="padding-left:12px;">WordPress &nbsp; PHP &nbsp; JS &nbsp; MySQL</div>
                    <div class="term-line muted" style="padding-left:12px;">REST API &nbsp; ACF &nbsp; WP-CLI</div>
                    <div class="term-line" style="margin-top:6px;"><span class="prompt">$</span> <span class="cmd">uptime</span></div>
                    <div class="term-line muted" style="padding-left:12px;">3+ years &nbsp;&nbsp; 10+ projects</div>
                </div>
            </div>
            <div class="skills-strip">
                <div class="skills-strip__inner">
                    <span class="skill-tag">PHP</span>
                    <span class="skill-tag">WordPress</span>
                    <span class="skill-tag">WooCommerce</span>
                    <span class="skill-tag">MySQL</span>
                    <span class="skill-tag">REST API</span>
                    <span class="skill-tag">ACF</span>
                    <span class="skill-tag">WP-CLI</span>
                    <span class="skill-tag">JavaScript</span>
                    <span class="skill-tag">Block Editor</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <div class="eyebrow"><?php _e('Portfolio', 'wpdev-portfolio'); ?></div>
                <h2><?php _e('Selected projects', 'wpdev-portfolio'); ?></h2>
                <p><?php _e('Production WordPress work spanning custom themes, plugins, and editorial tooling.', 'wpdev-portfolio'); ?></p>
            </div>

            <div class="projects-grid" id="projects-grid">
                <?php
                $projects = new WP_Query([
                    'post_type' => 'projects',
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                ]);

                if ($projects->have_posts()) :
                    while ($projects->have_posts()) : $projects->the_post();
                        get_template_part('template-parts/project-card');
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <p style="color: var(--text-secondary); font-size: 13px; grid-column: 1 / -1;"><?php _e('Projects will appear here once added.', 'wpdev-portfolio'); ?></p>
                <?php endif; ?>
            </div>

            <a href="<?php echo esc_url(home_url('/projects/')); ?>" class="view-all"><?php _e('View all projects', 'wpdev-portfolio'); ?> &rarr;</a>
        </div>
    </section>

    <!-- About -->
    <section class="about-section">
        <div class="container">
            <div class="eyebrow"><?php _e('About', 'wpdev-portfolio'); ?> <span class="new-badge"><?php _e('new', 'wpdev-portfolio'); ?></span></div>
            <div class="about-layout">
                <div class="avatar">RK</div>
                <div class="about-text">
                    <h2><?php _e('WordPress specialist with a product mindset.', 'wpdev-portfolio'); ?></h2>
                    <p><?php _e('I partner with founders, agencies, and product teams to turn complex content needs into reliable, scalable WordPress systems. Based in Kathmandu, available remote worldwide.', 'wpdev-portfolio'); ?></p>
                    <a href="<?php echo esc_url(home_url('/about/')); ?>" class="about-link"><?php _e('More about me', 'wpdev-portfolio'); ?> &rarr;</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-strip">
        <div class="eyebrow"><?php _e('Available for work', 'wpdev-portfolio'); ?></div>
        <h2><?php _e('Got a WordPress project?', 'wpdev-portfolio'); ?></h2>
        <p><?php _e('Freelance projects, plugin builds, performance audits, and long-term maintenance contracts.', 'wpdev-portfolio'); ?></p>
        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="cta-btn"><?php _e('Let\'s build something', 'wpdev-portfolio'); ?></a>
    </section>

</main>

<?php get_footer(); ?>