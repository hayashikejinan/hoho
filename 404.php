<?php
/**
 * 404 エラーページ (Not Found) を表示するテンプレート
 *
 * @package    WordPress
 * @subpackage Hoho
 */

get_header(); ?>

<div class="wrapper clearfix">

	<div class="main clearfix">

		<?php get_template_part( 'inc/breadcrumbs' ); ?>

		<article class="error404 hentry not-found">
			<header>
				<h1>Not found <span>:(</span></h1>
			</header>
			<section class="entry-content">
				<p>申し訳ありませんが、あなたが表示しようとしたページは存在しません。</p>

				<p>考えられる原因は:</p>
				<ul>
					<li>URLの打ち間違い</li>
					<li>リンクの期限切れ</li>
				</ul>
				<p>です。</p>

			</section>
			<footer>
				<h3>その他のヒント:</h3>

				<?php get_search_form(); ?>
			</footer>

		</article>

	</div>
	<!-- #main -->

	<?php get_sidebar(); ?>

</div>
<!-- #wrapper -->

<?php get_footer(); ?>
