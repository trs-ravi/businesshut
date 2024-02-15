<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h4 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ($comments_number === 1) {
                echo esc_html__('One Comment', 'businesshut');
            } else {
                echo sprintf(
                    esc_html(_n('%s Comment', '%s Comments', $comments_number, 'businesshut')),
                    number_format_i18n($comments_number)
                );
            }
            ?>
        </h4>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 42,
            ));
            ?>
        </ol>

        <?php
        if (!comments_open() && get_comments_number()) :
            ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'businesshut'); ?></p>
        <?php endif; ?>

        <!-- Comment Pagination -->
        <div class="comments-pagination">
            <?php paginate_comments_links(); ?>
        </div>

    <?php endif; ?>

    <?php comment_form(); ?>

</div>
