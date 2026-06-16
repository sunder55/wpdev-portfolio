<article class="project-card" data-types="<?php
$types = get_the_terms(get_the_ID(), 'project_type');
echo $types ? esc_attr(implode(',', wp_list_pluck($types, 'slug'))) : 'general';
?>">
    <a href="<?php the_permalink(); ?>" class="project-card__image">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('wpdev-card'); ?>
        <?php else : ?>
            <span class="project-card__placeholder">
                <span class="project-card__placeholder-inner"></span>
            </span>
        <?php endif; ?>
    </a>
    <div class="project-card__body">
        <?php if ($types) : ?>
            <div class="project-card__type"><?php echo esc_html($types[0]->name); ?></div>
        <?php endif; ?>
        <h3 class="project-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p class="project-card__excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 10)); ?></p>
        <?php
        $stack = get_the_terms(get_the_ID(), 'project_stack');
        if ($stack) : ?>
            <div class="project-card__stack">
                <?php foreach (array_slice($stack, 0, 3) as $tech) : ?>
                    <span class="project-card__tag"><?php echo esc_html($tech->name); ?></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</article>
