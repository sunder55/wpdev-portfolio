<?php get_header(); ?>

<main class="main">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php if (get_post_type() === 'projects') : ?>

                <article class="project-single">
                    <div class="project-single__header">
                        <div class="eyebrow"><?php _e('Case Study', 'wpdev-portfolio'); ?></div>
                        <h1 class="project-single__title"><?php the_title(); ?></h1>
                        <p class="project-single__desc"><?php echo esc_html(wpdev_get_field('wpdev_project_role') ?: get_the_excerpt()); ?></p>
                    </div>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="project-single__image">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="project-single__meta">
                        <div class="meta-card">
                            <span class="meta-card__label"><?php _e('Role', 'wpdev-portfolio'); ?></span>
                            <span class="meta-card__value"><?php echo esc_html(wpdev_get_field('wpdev_project_role') ?: __('Lead Developer', 'wpdev-portfolio')); ?></span>
                        </div>
                        <div class="meta-card">
                            <span class="meta-card__label"><?php _e('Type', 'wpdev-portfolio'); ?></span>
                            <?php $types = get_the_terms(get_the_ID(), 'project_type'); ?>
                            <span class="meta-card__value"><?php echo $types ? esc_html(implode(', ', wp_list_pluck($types, 'name'))) : __('WordPress', 'wpdev-portfolio'); ?></span>
                        </div>
                        <div class="meta-card">
                            <span class="meta-card__label"><?php _e('Stack', 'wpdev-portfolio'); ?></span>
                            <?php $stack = get_the_terms(get_the_ID(), 'project_stack'); ?>
                            <span class="meta-card__value"><?php echo $stack ? esc_html(implode(', ', wp_list_pluck($stack, 'name'))) : esc_html(wpdev_get_field('wpdev_tech_stack') ?: 'WordPress'); ?></span>
                        </div>
                    </div>

                    <div class="project-single__content">
                        <?php the_content(); ?>
                    </div>

                    <div class="project-single__actions">
                        <?php if ($url = wpdev_get_field('wpdev_live_url')) : ?>
                            <a href="<?php echo esc_url($url); ?>" class="btn btn--primary" target="_blank" rel="noopener"><?php _e('View live site', 'wpdev-portfolio'); ?></a>
                        <?php endif; ?>
                        <?php if ($url = wpdev_get_field('wpdev_github_url')) : ?>
                            <a href="<?php echo esc_url($url); ?>" class="btn btn--outline" target="_blank" rel="noopener"><?php _e('View code', 'wpdev-portfolio'); ?></a>
                        <?php endif; ?>
                        <a href="<?php echo esc_url(home_url('/projects/')); ?>" class="btn btn--outline"><?php _e('&larr; Back to projects', 'wpdev-portfolio'); ?></a>
                    </div>
                </article>

            <?php else : ?>

                <article <?php post_class('single-post'); ?>>
                    <h1 class="single-post__title"><?php the_title(); ?></h1>
                    <div class="single-post__meta">
                        <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                        <span><?php _e('by', 'wpdev-portfolio'); ?> <?php the_author(); ?></span>
                    </div>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="single-post__image"><?php the_post_thumbnail('large'); ?></div>
                    <?php endif; ?>
                    <div class="single-post__content"><?php the_content(); ?></div>
                    <?php comments_template(); ?>
                </article>

            <?php endif; ?>

        <?php endwhile; endif; ?>
    </div>
</main>

<?php get_footer(); ?>
