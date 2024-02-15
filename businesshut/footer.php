    </div>
</div>

<footer id="main_footer" class= mt-5>
    <div class="footer-widgets container">
        <div class="footer-widget-column">
            <?php dynamic_sidebar('footer-widget-1'); ?>
        </div>

        <div class="footer-widget-column">
            <?php dynamic_sidebar('footer-widget-2'); ?>
        </div>

        <div class="footer-widget-column">
            <?php dynamic_sidebar('footer-widget-3'); ?>
        </div>

        <div class="footer-widget-column">
            <?php dynamic_sidebar('footer-widget-4'); ?>
        </div>
    </div>
    <p class="text-center">&copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url('https://trssoftwaresolutions.com/'); ?>"><?php echo esc_html(get_theme_mod('theme_copyright_notice', 'businesshut. All rights reserved.')); ?></a></p>

</footer>



<?php wp_footer(); ?>

</body>
</html>