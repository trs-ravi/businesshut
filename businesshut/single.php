<?php get_header(); ?>

<div class="container mt-5">
    <div class="row singleGrid">
        <div class="col-lg-12 singleGrid_left">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <a href="<?php esc_url(get_permalink()); ?>">
                            <?php the_post_thumbnail('large'); ?>
                        </a>
                    </div>
                <?php endif; ?>
                    <header class="entry-header mt-4">
                        <h2 class="entry-title"><?php echo esc_html(get_the_title()); ?></h2>
                        <div class="entry-meta">
                            <?php
                            printf(
                                esc_html__('Published on %s', 'businesshut'),
                                '<span class="posted-on">' . esc_html(get_the_date()) . '</span>'
                            );

                            $tags_list = get_the_tag_list('', ', ');
                            if ($tags_list) {
                                printf('<span class="tags-links">' . esc_html__('Tags: %1$s', 'businesshut') . '</span>', esc_html($tags_list));
                            }
                            ?>
                        </div>
                    </header>

                    <div class="entry-content">
                        <?php echo wp_kses_post(get_the_content()); ?>
                    </div>

                    <footer class="entry-footer">
                        <?php
                        if (is_user_logged_in() && current_user_can('edit_post', get_the_ID())) {
                            edit_post_link(esc_html__('Edit', 'businesshut'), '<span class="edit-link">', '</span>');
                        }
                        ?>
                    </footer>
                </article>

                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
