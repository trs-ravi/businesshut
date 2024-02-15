<nav class="navbar navbar-expand-lg navbar-light bg-light container-fluid">
  <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php the_custom_logo(); ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo esc_attr__('Toggle navigation', 'businesshut'); ?>">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php
           wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu_class' => '',
            'container' => '',
            'items_wrap' => '<ul class="nav navbar-nav navbar-left">%3$s</ul>',
            'walker' => new Businesshut_Nav_Walker(),
            'fallback_cb' => 'Businesshut_Nav_Walker::fallback'
            )
        );
    ?>
    <div class="searchForm ml-3">
        <?php get_search_form(); ?>
    </div>
  </div>
</nav>
