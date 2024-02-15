<?php
/**
 * Template part for displaying search results
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
    </header>

    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <a href="<?php esc_url(get_permalink()); ?>">
                <?php the_post_thumbnail('large'); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="entry-summary">
        <?php echo wp_kses(get_the_excerpt(), 'post'); ?>
    </div>

    <footer class="entry-footer">
        <?php edit_post_link(__('Edit', 'businesshut'), '<span class="edit-link">', '</span>'); ?>
    </footer>
</article>
