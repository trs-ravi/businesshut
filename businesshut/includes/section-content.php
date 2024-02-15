<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article>
        <h3><?php echo esc_html(get_the_title()); ?></h3>
        <?php echo wp_kses_post(get_the_content()); ?>
    </article>
<?php endwhile; else: endif; ?>
