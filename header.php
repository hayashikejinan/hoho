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

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please
	<a href="http://browsehappy.com/">upgrade your browser</a> or
	<a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.
</p>
<![endif]-->

<div class="header-container">

	<?php
	// カスタムヘッダーを設定した場合表示する
	if ( get_header_image() ) : ?>
		<section class="site-header">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
			</a>
		</section>
	<?php endif; ?>

	<header class="wrapper clearfix">
		<h1 class="title">h1.title</h1>

		<?php
		/**
		 * ヘッダーメニュー
		 */
		wp_nav_menu(
			array(
				// 使うメニューの登録した名前を指定
				'theme_location'  => 'primary',
				// ul を囲むタグ。div か nav を指定。false でタグなし。デフォルト値は div
				'container'       => 'nav',
				// container にクラスを付与
				'container_class' => 'nav nav-top menu-container',
				// ul にクラスを付与。デフォルト値は menu
				'menu_class'      => 'menu menu-top',
			)
		); ?>

	</header>
</div>

<div class="main-container">
