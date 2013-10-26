<?php
/**
 * microdata 対応パンくずリスト
 *
 * support: https://support.google.com/webmasters/answer/185417?hl=ja
 *
 * @since 0.2
 * @todo  パンくずリストがページ内に複数ある場合の対応 itemprop="child"
 */

$delimiter      = '&raquo;'; // 区切り文字
$title          = null;
$output         = '';
$before         = '<span itemprop="title">';
$after          = '</span>';
$current_before = '<span class="current">';
$current_after  = '</span>';

if ( ! is_home() && ! is_front_page() || is_paged() ) {
	echo '<nav class="breadcrumbs" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">';
	global $post;
	$home = esc_url( home_url() );
	echo '<a href="' . $home . '"><i class="fontawesome-home"></i></a> ' . $delimiter . ' ';

	if ( is_category() ) {
		global $wp_query;
		$cat_obj    = $wp_query->get_queried_object();
		$this_cat   = $cat_obj->term_id;
		$this_cat   = get_category( $this_cat );
		$parent_cat = get_category( $this_cat->parent );
		if ( $this_cat->parent != 0 )
			$output .= (string) get_category_parents_with_rich_snippet( $parent_cat, true, ' ' . $delimiter . ' ' );
		else
			$output .= $current_before . _x( 'Category', 'taxonomy singular name' ) . $current_after . ' ' . $delimiter;
		$title = single_cat_title( '<i class="fontawesome-folder-open-alt main-color-dark"></i> ', false );
	} elseif ( is_day() ) {
		$output .= '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '" itemprop="url">' .
			$before . sprintf( _n( '%s year', '%s years', get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $after .
			'</a> ' . $delimiter . ' ';
		$output .= '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '" itemprop="url">' .
			$before . get_the_time( 'F' ) . $after . '</a> ' . $delimiter . ' ';
		$output .= $current_before . sprintf( _n( '%s day', '%s days', get_the_time( 'j' ) ), get_the_time( 'j' ) ) . $current_after;
		$title = '<i class="fontawesome-calendar main-color-dark"></i> ' .
			sprintf( __( '%1$s %2$d' ), get_the_time( 'F' ), get_the_time( 'Y' ) ) .
			sprintf( _n( '%s day', '%s days', get_the_time( 'j' ) ), get_the_time( 'j' ) ) . __( 'Archives' );
	} elseif ( is_month() ) {
		$output .= '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '" itemprop="url">' .
			$before . sprintf( _n( '%s year', '%s years', get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $after .
			'</a> ' . $delimiter . ' ';
		$output .= $current_before . get_the_time( 'F' ) . $current_after;
		$title = '<i class="fontawesome-calendar main-color-dark"></i> ' .
			sprintf( __( '%1$s %2$d' ), get_the_time( 'F' ), get_the_time( 'Y' ) ) . __( 'Archives' );
	} elseif ( is_year() ) {
		$output .= $current_before . sprintf( _n( '%s year', '%s years', get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $current_after;
		$title = '<i class="fontawesome-calendar main-color-dark"></i> ' .
			sprintf( _n( '%s year', '%s years', get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . __( 'Archives' );
	} elseif ( is_single() && ! is_attachment() ) {
		$cat = get_the_category();
		$cat = $cat[0];
		$output .= (string) get_category_parents_with_rich_snippet( $cat, true, ' ' . $delimiter . ' ' );
	} elseif ( is_attachment() ) {
		$parent = get_post( $post->post_parent );
		$cat    = get_the_category( $parent->ID );
		$cat    = $cat[0];
		$output .= (string) get_category_parents_with_rich_snippet( $cat, true, ' ' . $delimiter . ' ' );
		$output .= '<a href="' . get_permalink( $parent ) . '" itemprop="url">' .
			$before . $parent->post_title . $after . '</a> ' . $delimiter . ' ';
	} elseif ( is_page() && ! $post->post_parent ) {
		$output .= $current_before . the_title() . $current_after;
	} elseif ( is_page() && $post->post_parent ) {
		$parent_id   = $post->post_parent;
		$breadcrumbs = array();
		while ( $parent_id ) {
			$page          = get_post( $parent_id );
			$breadcrumbs[] = '<a href="' . get_permalink( $page->ID ) . '" itemprop="url">' .
				$before . get_the_title( $page->ID ) . $after . '</a>';
			$parent_id     = $page->post_parent;
		}
		$breadcrumbs = array_reverse( $breadcrumbs );
		foreach ( $breadcrumbs as $crumb ) {
			$output .= $crumb . ' ' . $delimiter . ' ';
		}
	} elseif ( is_search() ) {
		$output .= $current_before . __( "A search form for your site" ) . $current_after . ' ' . $delimiter;
		$title = '<i class="fontawesome-search main-color-dark"></i> ' .
			sprintf( __( 'Search Results %1$s %2$s' ), '&#39;', get_search_query() ) . ' &#39;';
	} elseif ( is_tag() ) {
		$output .= $current_before . __( 'Tags' ) . $current_after . ' ' . $delimiter;
		$title = single_tag_title( '<i class="fontawesome-tag main-color-dark"></i> ', false );
	} elseif ( is_author() ) {
		global $author;
		$user_data = get_userdata( $author );
		$output .= $current_before . __( 'Users' ) . $current_after;
		$title = '<i class="fontawesome-user main-color-dark"></i> ' .
			$current_before . sprintf( __( 'By: %s' ), $user_data->display_name ) . $current_after;
	} elseif ( is_404() ) {
		$output .= $current_before . 'Error 404' . $current_after;
	}

	echo $output;

	if ( get_query_var( 'paged' ) ) {
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
			echo ' (';
		echo __( 'Page' ) . ' ' . get_query_var( 'paged' );
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
			echo ')';
	}

	echo '</nav>';
}

if ( isset( $title ) )
	echo '<h1>' . $title . '</h1>';

/**
 * microdata リッチスニペット に対応した get_category_parents
 *
 * @since 0.2
 *
 * @param int    $id        Category ID.
 * @param bool   $link      Optional, default is false. Whether to format with link.
 * @param string $separator Optional, default is '/'. How to separate categories.
 * @param bool   $nicename  Optional, default is false. Whether to use nice name for display.
 * @param array  $visited   Optional. Already linked to categories to prevent duplicates.
 *
 * @return string|WP_Error A list of category parents on success, WP_Error on failure.
 */
function get_category_parents_with_rich_snippet( $id, $link = false, $separator = '/', $nicename = false, $visited = array() ) {
	$before = '<span itemprop="title">';
	$after  = '</span>';
	$chain  = '';
	$parent = get_term( $id, 'category' );
	if ( is_wp_error( $parent ) )
		return $parent;

	if ( $nicename )
		$name = $before . $parent->slug . $after;
	else
		$name = $before . $parent->name . $after;

	if ( $parent->parent && ( $parent->parent != $parent->term_id ) && ! in_array( $parent->parent, $visited ) ) {
		$visited[] = $parent->parent;
		$chain .= (string) get_category_parents_with_rich_snippet( $parent->parent, $link, $separator, $nicename, $visited );
	}

	if ( $link )
		$chain .= '<a href="' . esc_url( get_category_link( $parent->term_id ) ) . '" title="' .
			esc_attr( sprintf( __( "View all posts in %s" ), $parent->name ) ) . '" itemprop="url">' . $name . '</a>' . $separator;
	else
		$chain .= $name . $separator;
	return $chain;
}
