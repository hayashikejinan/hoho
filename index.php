<?php
/**
 * メインのテンプレートファイル
 *
 * WordPressテーマに必要な2つのテンプレートファイルのうち最も基本的なもの（もう一つは style.css）。
 * 特定のクエリに一致しない時にページを表示するため読み込まれる。
 * 例: home.phpファイルが存在しない時に使われる。
 * 詳しくは Codex へ: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package    WordPress
 * @subpackage Hoho
 */

get_header(); ?>

<div class="main wrapper clearfix">

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<article <?php post_class(); ?>>
				<header>

					<h1><?php the_title(); ?></h1>

					<time><?php the_time( 'Y.n.j' ); ?></time>

				</header>
				<section>

					<?php the_excerpt(); // 記事の抜粋を表示 ?>

				</section>
				<footer>

					<?php the_category(); ?>

				</footer>
			</article>

		<?php endwhile; ?>
	<?php endif; ?>

	<?php get_sidebar(); ?>

</div>
<!-- #main -->

<?php get_footer(); ?>
