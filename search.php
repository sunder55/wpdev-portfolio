<?php get_header(); ?>

<main class="main">
    <div class="container">
        <div class="section-header">
            <h1><?php printf(__('Search: %s', 'wpdev-portfolio'), get_search_query()); ?></h1>
        </div>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article <?php post_class('search-result'); ?>>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
            </article>
        <?php endwhile; else : ?>
            <p class="no-results"><?php _e('No results found. Try a different search.', 'wpdev-portfolio'); ?></p>
        <?php endif; ?>

        <?php the_posts_pagination(); ?>
    </div>
</main>

<?php get_footer(); ?>
