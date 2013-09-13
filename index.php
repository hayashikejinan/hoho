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

			<article>
				<header>
					<h1>article header h1</h1>

					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec.</p>
				</header>
				<section>

					<?php the_excerpt(); // 記事の抜粋を表示 ?>

				</section>
				<footer>
					<h3>article footer h3</h3>

					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor.</p>
				</footer>
			</article>

		<?php endwhile; ?>
	<?php endif; ?>

	<?php get_sidebar(); ?>

</div>
<!-- #main -->

<?php get_footer(); ?>
