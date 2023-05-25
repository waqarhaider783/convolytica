<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Convolytica_Community_Insight
 */
?>
<?php ob_start(); ?>
<?php header('X-Robots-Tag: noindex, nofollow'); ?>
<?php $imgHolder = 'data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs='; ?>
<?php

$url = $_SERVER['REQUEST_URI'];
if (strstr($url, '.php')) {

	$url = explode('/', $url);
	$fileName = end($url);
	// $fileName = str_replace('.php', '', $fileName);
	$fileName = current(explode('.', $fileName));

	if ($fileName == 'index') {
		$fileName = 'home';
	}
} else {
	$fileName = 'home';
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<title>Convolytica Community Insight</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, initial-scale=1.0" />
	<meta name="description" content="Coupon Sites Description" />
	<meta name="keywords" content="Coupons, Deals, Codes" />
	<meta name="robots" content="noindex,nofollow">


	<!--  Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#19a989" />
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#19a989" />
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#19a989" />



	<link rel="icon" href="favicon.png" type="image/x-icon" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<!-- <link rel="stylesheet" href="build/css/swiper.css" /> -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<main id="page" class="mainWrapper">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'convolytica-community-insight'); ?></a>

		<div class="container">
			<header class="header combine-banner">
				<?php
				while (have_rows('header_section', 'option')) : the_row(); ?>
					<p class="title"><?php echo get_sub_field('top_text'); ?> <a href="<?php echo get_sub_field('btn_link'); ?>"><?php echo get_sub_field('btn_text'); ?></a></p>
				<?php endwhile;

				?>
				<div class="header-inner flex">
					<?php the_custom_logo(); ?>
					<div class="menu_icon"><i class="x_menu"></i></div>
					<div class="view">
						<div class="logo_close">
							<?php
							while (have_rows('header_section', 'option')) : the_row();
								$logo = get_sub_field('mobile_logo');
							?>
								<a href="<?php echo get_sub_field('logo_link');?>" class="logo-wrapper">
									<img src="<?php echo $logo['url']; ?>" alt="alt" height="21" width="170" />
								</a>
							<?php endwhile; ?>
							<i class="x_close close_menu_btn"></i>
						</div>
						<?php wp_nav_menu(
							array(
								'menu' => 'header_menu',
								'menu_class' => 'navigation flex'
							)
						);
						?>
					</div>

				</div>

			</header>
		</div>