<?php
/**
 * ヘッダー
 *
 * <head> セクションをすべてと、<div class="main-container"> までを表示
 *
 * @package    WordPress
 * @subpackage Hoho
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]>
<html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]>
<html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="viewport" content="width=device-width">

	<title><?php wp_title(); ?></title>

	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/screen.css">
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/ie.css"><![endif]-->

	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

	<?php wp_head(); ?>
</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please
	<a href="http://browsehappy.com/">upgrade your browser</a> or
	<a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.
</p>
<![endif]-->

<div class="header-container">
	<header class="wrapper clearfix">
		<h1 class="title">h1.title</h1>
		<nav>
			<ul>
				<li><a href="#">nav ul li a</a></li>
				<li><a href="#">nav ul li a</a></li>
				<li><a href="#">nav ul li a</a></li>
			</ul>
		</nav>
	</header>
</div>

<div class="main-container">
