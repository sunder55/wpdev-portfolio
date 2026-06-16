<?php get_header(); ?>

<main class="main">
    <div class="container">
        <div class="section-header">
            <div class="eyebrow"><?php _e('Blog', 'wpdev-portfolio'); ?></div>
            <h1><?php _e('Posts', 'wpdev-portfolio'); ?></h1>
        </div>

        <div class="posts-grid">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="post-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" class="post-card__image"><?php the_post_thumbnail('medium'); ?></a>
                    <?php endif; ?>
                    <div class="post-card__body">
                        <div class="post-card__date"><?php echo get_the_date(); ?></div>
                        <h2 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p class="post-card__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 12); ?></p>
                        <a href="<?php the_permalink(); ?>" class="post-card__more"><?php _e('Read more', 'wpdev-portfolio'); ?></a>
                    </div>
                </article>
            <?php endwhile; else : ?>
                <p style="color: var(--text-secondary); font-size: 13px; grid-column: 1 / -1;"><?php _e('No posts found.', 'wpdev-portfolio'); ?></p>
            <?php endif; ?>
        </div>

        <?php the_posts_pagination(); ?>
    </div>
</main>

<?php get_footer(); ?>
