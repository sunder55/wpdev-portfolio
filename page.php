<?php get_header(); ?>

<main class="main">
    <div class="container">
        <div class="page-content">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h1 class="page-content__title"><?php the_title(); ?></h1>
                <div class="page-content__body"><?php the_content(); ?></div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
