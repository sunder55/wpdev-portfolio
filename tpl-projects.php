<?php
/**
 * Template Name: Projects
 */
get_header(); ?>

<main class="main">
    <div class="container">
        <div class="section-header">
            <div class="eyebrow"><?php _e('Portfolio', 'wpdev-portfolio'); ?></div>
            <h1><?php _e('All projects', 'wpdev-portfolio'); ?></h1>
            <p><?php _e('A curated collection of WordPress builds, plugins, and solutions.', 'wpdev-portfolio'); ?></p>
        </div>

        <div class="project-filters" id="project-filters" style="display:flex; gap:6px; flex-wrap:wrap; margin-bottom:20px;">
            <button class="btn btn--outline filter-btn active" data-filter="all" style="font-size:12px; padding:5px 12px;"><?php _e('All', 'wpdev-portfolio'); ?></button>
            <?php
            $types = get_terms(['taxonomy' => 'project_type', 'hide_empty' => true]);
            foreach ($types as $type) :
            ?>
                <button class="btn btn--outline filter-btn" data-filter="<?php echo esc_attr($type->slug); ?>" style="font-size:12px; padding:5px 12px;"><?php echo esc_html($type->name); ?></button>
            <?php endforeach; ?>
        </div>

        <div class="projects-grid" id="projects-grid">
            <?php
            $projects = new WP_Query([
                'post_type' => 'projects',
                'posts_per_page' => -1,
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
                <p style="color: var(--text-secondary); font-size: 13px; grid-column: 1 / -1;"><?php _e('No projects found.', 'wpdev-portfolio'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
