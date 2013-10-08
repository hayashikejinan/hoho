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

		<!-- pagination -->
		<div class="navigation">
			<div class="alignleft"><?php previous_posts_link( '&laquo; 前へ' ) ?></div>
			<div class="alignright"><?php next_posts_link( '次へ &raquo;', '' ) ?></div>
		</div>
		<!-- pagination -->

	</div>
	<!-- #main -->

	<?php get_sidebar(); ?>

</div>
<!-- #wrapper -->

<?php get_footer(); ?>
