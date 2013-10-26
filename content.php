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

<?php get_template_part( 'inc/breadcrumbs' ); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<article <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
			<header>

				<h1 itemprop="name">
					<a href="<?php the_permalink(); ?>" itemprop="url"><?php the_title(); ?></a>
				</h1>

				<?php if ( is_archive() || is_home() || is_single() ): ?>

					<time itemprop="datePublished" datetime="<?php the_time( 'Y-m-d' ); ?>">
						<i class="fontawesome-time"></i>
						<?php the_time( __( 'Y/m/d' ) ); ?>
					</time>

					<i class="fontawesome-user"></i>
					<?php
					// 投稿者リンク 構造化データマークアップ
					global $authordata;
					echo sprintf(
						'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
						// %1$s = link
						esc_url( get_author_posts_url( $authordata->ID, $authordata->user_nicename ) ),
						// %2$s = title
						esc_attr( sprintf( __( 'Posts by %s' ), get_the_author() ) ),
						// %3$s = content
						'<span itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name">' .
						get_the_author() . '</span></span>'
					);
					?>

					<?php
					// カテゴリをリスト化せずリンクで
					$categories = get_the_category();
					if ( $categories ) {
						$separator = ' ';
						$output    = '<i class="fontawesome-folder-open-alt"> </i>';
						if ( $categories ) {
							foreach ( $categories as $category ) {
								$output .= '<a href="' . get_category_link( $category->term_id ) . '" title="' .
									esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">' .
									'<span itemprop="articleSection">' . $category->cat_name . '</span></a>' . $separator;
							}
							echo trim( $output, $separator );
						}
					}; ?>

				<?php endif; ?>

			</header>
			<section class="entry-content">

				<?php if ( is_singular() ) : ?>

					<?php get_template_part( 'template/content', 'before' ); ?>

					<div itemprop="articleBody">
						<?php the_content(); // 記事を表示 ?>
					</div>

					<?php get_template_part( 'template/content', 'after' ); ?>

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

					<?php
					// 記事内ページャー
					wp_link_pages(
						array(
							'before'      => '<nav class="pagination">',
							'after'       => '</nav>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						)
					);?>

					<?php
					// タグをループで
					$tags = get_the_tags();
					if ( $tags ) : ?>
						<p class="tags">
							<span class="label">
								<i class="fontawesome-tags"></i>
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
