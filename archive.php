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
