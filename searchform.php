<?php
/**
 * 検索 get_search_form のテンプレートファイル
 *
 * @package    WordPress
 * @subpackage Hoho
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<fieldset>
		<label>
			<i class="fontawesome-search"></i>
			<input type="search" class="search-field" placeholder=" <?php echo esc_attr_x( 'Search &hellip;', 'placeholder' ); ?>"
				   value="<?php the_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ); ?>" />
		</label>
		<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
	</fieldset>
</form>
