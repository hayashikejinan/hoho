<?php
/**
 *
 */

$delimiter      = '&raquo;'; // 区切り文字
$title          = null;
$current_before = '<span class="current">';
$current_after  = '</span>';

if ( ! is_home() && ! is_front_page() || is_paged() ) {
	echo '<nav class="breadcrumbs">';
	global $post;
	$home = home_url();
	echo '<a href="' . $home . '"><i class="fontawesome-home"></i></a> ' . $delimiter . ' ';

	if ( is_category() ) {
		global $wp_query;
		$cat_obj   = $wp_query->get_queried_object();
		$this_cat  = $cat_obj->term_id;
		$this_cat  = get_category( $this_cat );
		$parent_cat = get_category( $this_cat->parent );
		if ( $this_cat->parent != 0 )
			printf( get_category_parents( $parent_cat, true, ' ' . $delimiter . ' ' ) );
		else
			echo $current_before . _x( 'Category', 'taxonomy singular name' ) . $current_after . ' ' . $delimiter;
		$title     = single_cat_title( '<i class="fontawesome-folder-open-alt main-color-dark"></i> ', false );
	} elseif ( is_day() ) {
		echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' .
			sprintf( _n( '%s year', '%s years', get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . '</a> ' . $delimiter . ' ';
		echo '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a> ' . $delimiter . ' ';
		echo $current_before . sprintf( _n( '%s day', '%s days', get_the_time( 'j' ) ), get_the_time( 'j' ) ) . $current_after;
		$title = '<i class="fontawesome-calendar main-color-dark"></i> ' . __( 'Archives' );
	} elseif ( is_month() ) {
		echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' .
			sprintf( _n( '%s year', '%s years', get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . '</a> ' . $delimiter . ' ';
		echo $current_before . get_the_time( 'F' ) . $current_after;
		$title = '<i class="fontawesome-calendar main-color-dark"></i> ' . __( 'Archives' );
	} elseif ( is_year() ) {
		echo $current_before . sprintf( _n( '%s year', '%s years', get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $current_after;
		$title = '<i class="fontawesome-calendar main-color-dark"></i> ' . __( 'Archives' );
	} elseif ( is_single() && ! is_attachment() ) {
		$cat = get_the_category();
		$cat = $cat[0];
		printf( get_category_parents( $cat, true, ' ' . $delimiter . ' ' ) );
	} elseif ( is_attachment() ) {
		$parent = get_post( $post->post_parent );
		$cat    = get_the_category( $parent->ID );
		$cat    = $cat[0];
		printf( get_category_parents( $cat, true, ' ' . $delimiter . ' ' ) );
		echo '<a href="' . get_permalink( $parent ) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
	} elseif ( is_page() && ! $post->post_parent ) {
	} elseif ( is_page() && $post->post_parent ) {
		$parent_id   = $post->post_parent;
		$breadcrumbs = array();
		while ( $parent_id ) {
			$page          = get_post( $parent_id );
			$breadcrumbs[] = '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
			$parent_id     = $page->post_parent;
		}
		$breadcrumbs = array_reverse( $breadcrumbs );
		foreach ( $breadcrumbs as $crumb ) {
			echo $crumb . ' ' . $delimiter . ' ';
		}
	} elseif ( is_search() ) {
		echo $current_before . _e( 'Search' ) . $current_after . ' ' . $delimiter;
		$title = '<i class="fontawesome-search main-color-dark"></i> ' .
			sprintf( __( 'Search Results %1$s %2$s' ), '&#39;', get_search_query() ) . ' &#39;';
	} elseif ( is_tag() ) {
		echo $current_before . __( 'Tags' ) . $current_after . ' ' . $delimiter;
		$title = single_tag_title( '<i class="fontawesome-tag main-color-dark"></i> ', false );
	} elseif ( is_author() ) {
		global $author;
		$user_data = get_userdata( $author );
		echo $current_before . __( 'Users' ) . $current_after;
		$title = '<i class="fontawesome-user main-color-dark"></i> ' .
			$current_before . sprintf( __( 'By: %s' ), $user_data->display_name ) . $current_after;
	} elseif ( is_404() ) {
		echo $current_before . 'Error 404' . $current_after;
	}

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
