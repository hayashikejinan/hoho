<?php
/**
 * 投稿のテンプレートファイル
 *
 * @package    WordPress
 * @subpackage Hoho
 */

get_header(); ?>

<div class="wrapper clearfix">

	<div class="main clearfix">

		<?php
		// content.php を読み込む
		get_template_part( 'content' ); ?>

	</div>
	<!-- #main -->

	<?php get_sidebar(); ?>

</div>
<!-- #wrapper -->

<?php get_footer(); ?>
