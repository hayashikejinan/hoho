<?php
/**
 * ページネーション
 */

if ( is_singular() )
	return;

global $wp_query;

// 1ページしかない時に実行を終える
if ( $wp_query->max_num_pages <= 1 )
	return;

$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
$max   = intval( $wp_query->max_num_pages );

// 現在のページを配列に入れる
if ( $paged >= 1 )
	$links[] = $paged;

// 現在のページ周辺のページを配列に入れる
if ( $paged >= 3 ) {
	$links[] = $paged - 1;
	$links[] = $paged - 2;
}

if ( ( $paged + 2 ) <= $max ) {
	$links[] = $paged + 2;
	$links[] = $paged + 1;
}

echo '<nav class="navigation"><ul>' . "\n";

// 前のページへ
if ( get_previous_posts_link() )
	printf( '<li>%s</li>' . "\n", get_previous_posts_link( '&laquo;' ) );

// 最初のページへのリンク、必要に応じて省略も
if ( ! in_array( 1, $links ) ) {
	$class = 1 == $paged ? ' class="active"' : '';

	printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

	if ( ! in_array( 2, $links ) )
		echo '<li>…</li>';
}

// 現在のページリンク、前後2ページを必要に応じて
sort( $links );
foreach ( (array) $links as $link ) {
	$class = $paged == $link ? ' class="active"' : '';
	printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
}

// 最後のページへのリンク、必要に応じて省略も
if ( ! in_array( $max, $links ) ) {
	if ( ! in_array( $max - 1, $links ) )
		echo '<li>…</li>' . "\n";

	$class = $paged == $max ? ' class="active"' : '';
	printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
}

// 次のページへ
if ( get_next_posts_link() )
	printf( '<li>%s</li>' . "\n", get_next_posts_link( '&raquo;' ) );

echo '</ul></nav>' . "\n";
