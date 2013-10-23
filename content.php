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

				<h1>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h1>

				<time><i class="icon-clock"></i> <?php the_time( __( 'Y/m/d' ) ); ?></time>

				<?php
				// カテゴリをリスト化せずリンクで
				$categories = get_the_category();
				if ( $categories ) {
					$separator = ' ';
					$output    = '<i class="icon-file_close_alt"> </i>';
					if ( $categories ) {
						foreach ( $categories as $category ) {
							$output .= '<a href="' . get_category_link( $category->term_id ) . '" title="' .
								esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">' .
								$category->cat_name . '</a>' . $separator;
						}
						echo trim( $output, $separator );
					}
				};
				?>

			</header>
			<section>

				<?php if ( is_singular() ) : ?>

					<?php the_content(); // 記事を表示 ?>

				<?php else: ?>

					<?php
					// アイキャッチが設定されているか確認
					if ( has_post_thumbnail() ) {
						// アイキャッチ画像を出力
						the_post_thumbnail();
					};
					?>

					<?php the_excerpt(); // 記事の抜粋を表示 ?>

				<?php endif; ?>

			</section>
			<footer>

				<?php if ( is_singular() ) : ?>

					<?php $tags = get_the_tags();
					if ( $tags ) : ?>
						<p class="tags">
							<span class="label">
								<i class="icon-hashtag"></i>
								<?php foreach ( $tags as $tag ) : ?>
									<a rel="tag" href="<?php echo get_tag_link( $tag->term_id ); ?>">
										<?php echo $tag->name; ?>
									</a>
								<?php endforeach; ?>
							</span>
						</p>
					<?php endif; ?>

				<?php else: ?>
				<?php endif; ?>

			</footer>
		</article>

	<?php endwhile; ?>
<?php endif; ?>

<?php comments_template(); ?>
