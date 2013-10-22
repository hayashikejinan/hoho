<?php
/**
 * 検索結果のテンプレートファイル
 *
 * @package    WordPress
 * @subpackage Hoho
 */

get_header(); ?>

<div class="wrapper clearfix">

	<div class="main clearfix">

		<header class="page-header">

			<h1 class="page-title">
				<?php wp_title(''); ?>
			</h1>

		</header>

		<?php
		// content.php を読み込む
		get_template_part( 'content' ); ?>

		<?php get_template_part( 'inc/pagination' ); ?>

	</div>
	<!-- #main -->

	<?php get_sidebar(); ?>

</div>
<!-- #wrapper -->

<?php get_footer(); ?>
