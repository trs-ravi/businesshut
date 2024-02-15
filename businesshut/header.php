<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>

<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'businesshut'); ?></a>
<div id="page" class="site">
	<header id="mainhead" class="site-header" role="banner">
		<?php get_template_part( 'includes/header/nav' ); ?>
	</header>
	<div id="content" class="site-content">