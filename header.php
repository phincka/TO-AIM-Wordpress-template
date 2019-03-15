<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php $title = (get_field('title-seo')) ? get_field('title-seo') : get_bloginfo('title'); ?>
	<title><?php echo $title ?></title>

	<?php $description = (get_field('description-seo')) ? get_field('description-seo') : get_bloginfo('description') ?>
	<meta name="description" content="<?php echo $description ?>">

	<meta name="theme-color" content="#4285f4">

	<!-- OG -->
	<meta property="og:url" content="<?php the_permalink() ?>">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php the_title() ?>">
	<meta property="og:image" content="<?php asset('img/og.png') ?>">
	<meta property="og:description" content="<?php echo $description ?>">
	<meta property="og:site_name" content="<?php echo $title ?>">
	<meta property="og:locale" content="<?php echo get_locale() ?>">
	<!-- OG -->

	<link rel="shortcut icon" href="<?php asset('img/aim-logo.png'); ?>">

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<!-- wp -->
	<?php wp_head(); ?>
	<!-- wp -->
</head>

<body <?php body_class(); ?>>

	<noscript>
		<p>Do pelnego funkcjonowania witryny potrzebny jest JavaScript.</p>
		<p>This page needs JavaScript activated to work properly.</p>
		<style>
			noscript {
				position: fixed;
				z-index: 123;
				background: #f00;
				text-align: center;
				width: 100%;
				display: block;
				padding: 20px 20px;
				width: 250px;
				bottom: 0;
				right: 0
			}

			.owl-carousel {
				display: block;
			}
		</style>
	</noscript>

	<header class="header headroom" role="banner">
		<div class="grid">
			<a class="header__branding" href="<?php echo get_home_url(); ?>">
				<img src="<?php asset('img/aim-logo.png') ?>" alt="<?php echo get_bloginfo('title') ?>">
			</a>
			<nav class="header__nav" role="navigation">
				<?php wp_nav_menu(['theme_location' => 'header', 'container' => false]); ?>
				<div class="menu__toggle">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 30">
						<path d="M0,5H62c13,0,6,28-4,18L35,0" />
						<path d="M0,15H70" />
						<path d="M0,25H62c13,0,6-28-4-18L35,30" />
					</svg>
				</div>
			</nav>

		</div>
	</header>

	<main class="main">