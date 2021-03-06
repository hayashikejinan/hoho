<?php
/**
 * アーカイブのテンプレートファイル
 *
 * 特定のクエリに一致しない時にアーカイブページ（タグ、カテゴリー、日付別、作成者）を表示するため読み込まれる。
 * 例: date.phpファイルが存在しない時に日付別アーカイブとして使われる。
 * 詳しくは Codex へ: http://codex.wordpress.org/Template_Hierarchy
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

		<?php get_template_part( 'inc/pagination' ); ?>

	</div>
	<!-- #main -->

	<?php get_sidebar(); ?>

</div>
<!-- #wrapper -->

<?php get_footer(); ?>
