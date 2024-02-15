<?php

function businesshut_load_css(){
    wp_register_style('businesshut_bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('businesshut_bootstrap');

    wp_register_style('businesshut_main', get_template_directory_uri().'/assets/css/businesshut_main.css', array(), false, 'all');
    wp_enqueue_style('businesshut_main');
}
add_action('wp_enqueue_scripts', 'businesshut_load_css');

function businesshut_load_js(){

    wp_enqueue_script('jquery');

    wp_register_script('businesshut_bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', 'jquery', false, true);
    wp_enqueue_script('businesshut_bootstrap');
}
add_action('wp_enqueue_scripts', 'businesshut_load_js');


//------------------------ Supports for businesshut theme------------------------------------

// Add theme support for custom logo
add_theme_support('custom-logo', array(
    'height'      => 50, 
    'width'       => 50, 
    'flex-height' => true,
    'flex-width'  => true,
));

// Add theme support for post thumbnails
add_theme_support("post-thumbnails");

add_theme_support("wp-block-styles");

add_theme_support("responsive-embeds");

add_theme_support("html5", array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

// Add theme support for post tags
add_theme_support('post_tags');

add_theme_support("custom-header", array(
    'width'         => 1200,
    'height'        => 280,
    'default-image' => get_template_directory_uri() . '/assets/images/businesshut_default-header.JPG',
    'uploads'       => true,
    'header-text'   => false,
));

add_theme_support("align-wide");

function businesshut_register_block_styles() {
    // Register block styles
    register_block_style(
        'core/paragraph',
        array(
            'name'  => 'businesshut_your-custom-style',
            'label' => __('Your Custom Style', 'businesshut'), 
        )
    );
 }
 add_action('init', 'businesshut_register_block_styles');
 

function businesshut_register_block_patterns() {
    // Register block patterns
    register_block_pattern(
        'businesshut/custom-pattern',
        array(
            'title'       => __('Custom Pattern', 'businesshut'),
            'content'     => '<!-- Your block pattern content here -->',
            'categories'  => array('text'),
            'description' => __('A custom block pattern.',  'businesshut'),
        )
    );
}
add_action('init', 'businesshut_register_block_patterns');


function businesshut_add_editor_styles() {
    add_editor_style('editor-styles.css');
}
add_action('admin_init', 'businesshut_add_editor_styles');


function businesshut_enqueue_comment_reply_script() {
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'businesshut_enqueue_comment_reply_script');




require(get_template_directory() . '/includes/businesshut-nav-walker.php');


register_nav_menus(array(
    'primary' => __('Main Menu', 'businesshut'),
));

add_action( 'after_setup_theme', 'businesshut_theme_functions' );
function businesshut_theme_functions() {

    add_theme_support( 'title-tag' );

}


function businesshut_theme_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 1', 'businesshut'),
        'id'            => 'footer-widget-1',
        'description'   => esc_html__('Add widgets here to appear in your footer.', 'businesshut'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 2', 'businesshut'),
        'id'            => 'footer-widget-2',
        'description'   => esc_html__('Add widgets here to appear in your footer.', 'businesshut'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 3', 'businesshut'),
        'id'            => 'footer-widget-3',
        'description'   => esc_html__('Add widgets here to appear in your footer.', 'businesshut'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 4', 'businesshut'),
        'id'            => 'footer-widget-4',
        'description'   => esc_html__('Add widgets here to appear in your footer.', 'businesshut'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'businesshut_theme_widgets_init');

$args = array(
    'before'           => '<p class="page-links">' . __('Pages:', 'businesshut'),
    'after'            => '</p>',
    'link_before'      => '<span>',
    'link_after'       => '</span>',
    'next_or_number'   => 'number',
    'separator'        => ' ',
    'nextpagelink'     => __('Next page', 'businesshut'),
    'previouspagelink' => __('Previous page', 'businesshut'),
    'pagelink'         => '%',
    'echo'             => 1
);

wp_link_pages($args);


// Add support for automatic feed links
add_theme_support('automatic-feed-links');

add_theme_support('custom-background');

function businesshut_theme_customizer_settings($wp_customize) {
    // Add a custom section
    $wp_customize->add_section('businesshut_background_options', array(
        'title'    => __('Background Options', 'businesshut'),
        'priority' => 200,
    ));

    // Add a setting for background color
    $wp_customize->add_setting('businesshut_background_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Add a control for background color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'businesshut_background_color', array(
        'label'    => __('Background Color', 'businesshut'),
        'section'  => 'businesshut_background_options',
        'settings' => 'businesshut_background_color',
    )));

      // Typography Settings Section
    $wp_customize->add_section('businesshut_typography_settings', array(
        'title'    => __('Typography Settings', 'businesshut'),
        'priority' => 201,
    ));

    // Body Font Size Setting
    $wp_customize->add_setting('businesshut_body_font_size', array(
        'default'           => '16px',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('businesshut_body_font_size', array(
        'type'     => 'text',
        'label'    => __('Body Font Size', 'businesshut'),
        'section'  => 'businesshut_typography_settings',
        'settings' => 'businesshut_body_font_size',
    ));

    // Body Font Color Setting
    $wp_customize->add_setting('businesshut_body_font_color', array(
        'default'           => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'businesshut_body_font_color', array(
        'label'    => __('Body Font Color', 'businesshut'),
        'section'  => 'businesshut_typography_settings',
        'settings' => 'businesshut_body_font_color',
    )));

    // Individual Heading Font Settings (h1 to h6)
    for ($i = 1; $i <= 6; $i++) {
        // Heading Font Size Setting
        $wp_customize->add_setting("businesshut_h{$i}_font_size", array(
            'default'           => '24px', // Adjust default as needed
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("businesshut_h{$i}_font_size", array(
            'type'     => 'text',
            'label'    => sprintf(__('Heading %d Font Size', 'businesshut'), $i),
            'section'  => 'businesshut_typography_settings',
            'settings' => "businesshut_h{$i}_font_size",
        ));

        // Heading Font Color Setting
        $wp_customize->add_setting("businesshut_h{$i}_font_color", array(
            'default'           => '#000000', // Adjust default as needed
            'sanitize_callback' => 'sanitize_hex_color',
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "businesshut_h{$i}_font_color", array(
            'label'    => sprintf(__('Heading %d Font Color', 'businesshut'), $i),
            'section'  => 'businesshut_typography_settings',
            'settings' => "businesshut_h{$i}_font_color",
        )));

        // Heading Font Weight Setting (dropdown)
        $wp_customize->add_setting("businesshut_h{$i}_font_weight", array(
            'default'           => 'normal', // Adjust default as needed
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("businesshut_h{$i}_font_weight", array(
            'type'     => 'select',
            'label'    => sprintf(__('Heading %d Font Weight', 'businesshut'), $i),
            'section'  => 'businesshut_typography_settings',
            'settings' => "businesshut_h{$i}_font_weight",
            'choices'  => array(
                'normal' => __('Normal', 'businesshut'),
                'bold'   => __('Bold', 'businesshut'),
                // Add more font weight options as needed
            ),
        ));
    
    }

     // Copyright Settings Section
     $wp_customize->add_section('businesshut_copyright_settings', array(
        'title'    => __('Copyright Settings', 'businesshut'),
        'priority' => 202,
    ));

    // Copyright Notice Setting
    $wp_customize->add_setting('businesshut_copyright_notice', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('businesshut_copyright_notice', array(
        'type'     => 'text',
        'label'    => __('Copyright Notice', 'businesshut'),
        'section'  => 'businesshut_copyright_settings',
        'settings' => 'businesshut_copyright_notice',
    ));
}
add_action('customize_register', 'businesshut_theme_customizer_settings');

function businesshut_theme_customize_css() {
    ?>
    <style type="text/css">
        body {
            background-color: <?php echo esc_attr(get_theme_mod('businesshut_background_color', '#ffffff')); ?>;
            font-size: <?php echo esc_attr(get_theme_mod('businesshut_body_font_size', '16px')); ?>;
            color: <?php echo esc_attr(get_theme_mod('businesshut_body_font_color', '#333333')); ?>;
        }

        <?php
        // Apply styles for individual heading levels (h1 to h6)
        for ($i = 1; $i <= 6; $i++) {
            ?>
            h<?php echo $i; ?> {
                font-size: <?php echo esc_attr(get_theme_mod("businesshut_h{$i}_font_size", '24px')); ?>;
                color: <?php echo esc_attr(get_theme_mod("businesshut_h{$i}_font_color", '#000000')); ?>;
                font-weight: <?php echo esc_attr(get_theme_mod("businesshut_h{$i}_font_weight", 'normal')); ?>;
            }
            <?php
        }
        ?>
        /* Add more CSS rules based on other customizer settings */
    </style>
    <?php
}
add_action('wp_head', 'businesshut_theme_customize_css');


function businesshut_comment_callback($comment, $args, $depth) {
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <div class="comment-author vcard">
            <?php echo get_avatar($comment, $args['avatar_size']); ?>
            <?php printf(esc_html__('<cite class="fn">%s</cite> <span class="says">says:</span>', 'businesshut'), get_comment_author_link()); ?>
        </div>
        <?php if ($comment->comment_approved == '0') : ?>
            <em><?php esc_html_e('Your comment is awaiting moderation.', 'businesshut'); ?></em>
            <br/>
        <?php endif; ?>
 
        <div class="comment-meta commentmetadata">
            <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                <?php
                /* translators: 1: date, 2: time */
                printf(
                    esc_html__('%1$s at %2$s', 'businesshut'),
                    get_comment_date(),
                    get_comment_time()
                ); ?>
            </a>
            <?php
            edit_comment_link(esc_html__('(Edit)', 'businesshut'), '  ', '');
            ?>
        </div>
 
        <?php comment_text(); ?>
 
        <div class="reply">
            <?php
            comment_reply_link(
                array_merge(
                    $args,
                    array(
                        'reply_text' => esc_html__('Reply', 'businesshut'),
                        'depth'      => $depth,
                        'max_depth'  => $args['max_depth'],
                    )
                )
            );
            ?>
        </div>
    <?php
 }
 
 function businesshut_end_comment_callback() {
    ?></li><?php
 }
