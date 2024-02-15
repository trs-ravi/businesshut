<?php get_header(); ?>

<main id="main" class="site-main container-fluid pt-5" role="main">

    <header class="page-header">
        <h2 class="page-title text-center"><?php printf(__('Search Results for: %s', 'businesshut'), '<span>' . get_search_query() . '</span>'); ?></h2>
    </header>

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>
            <div class="row mt-5">
                <div class="col-lg-4 col-md-12">
                    <?php
                    // Include your custom search result template here
                    get_template_part('includes/search-result');
                    ?>
                </div>
            </div>

        <?php endwhile; ?>

        <?php the_posts_pagination(); ?>

    <?php else : ?>

        <p><?php esc_html_e('No results found.', 'businesshut'); ?></p>

    <?php endif; ?>

</main>

<?php get_footer(); ?>
