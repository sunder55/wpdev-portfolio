<article <?php post_class('content-item'); ?>>
    <?php if (is_singular()) : ?>
        <h1 class="content-item__title"><?php the_title(); ?></h1>
        <?php the_content(); ?>
    <?php else : ?>
        <h2 class="content-item__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p class="content-item__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
    <?php endif; ?>
</article>
