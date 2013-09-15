<?php
/**
 * コンテンツループのテンプレートファイル
 *
 * ループを条件別に
 *
 * @package    WordPress
 * @subpackage Hoho
 */
?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<article <?php post_class(); ?>>
			<header>

				<h1><?php the_title(); ?></h1>

				<time><?php the_time( 'Y.n.j' ); ?></time>

				<?php the_category(); ?>

			</header>
			<section>

				<?php the_excerpt(); // 記事の抜粋を表示 ?>

			</section>
			<footer>

				<?php the_tags(); ?>

			</footer>
		</article>

	<?php endwhile; ?>
<?php endif; ?>
