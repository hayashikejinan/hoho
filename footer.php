<?php
/**
 * フッター
 *
 * class="main-container" div の閉じタグ以降のコンテンツ
 *
 * @package    WordPress
 * @subpackage Hoho
 */
?>

</div>
<!-- #main-container -->

<div class="footer-container">

	<div class="wrapper clearfix">
		<?php
		/**
		 * フッターメニュー
		 */
		wp_nav_menu(
			array(
				// 使うメニューの登録した名前を指定
				'theme_location'  => 'secondary',
				// ul を囲むタグ。div か nav を指定。false でタグなし。デフォルト値は div
				'container'       => 'nav',
				// container にクラスを付与
				'container_class' => 'nav nav-bottom menu-container',
				// ul にクラスを付与。デフォルト値は menu
				'menu_class'      => 'menu menu-bottom',
			)
		); ?>
	</div>

	<footer class="wrapper">
		<h3>footer</h3>
	</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
