<?php
/**
 * サイドバー
 *
 * メインウィジェット領域を含むサイドバー。
 *
 * @package    WordPress
 * @subpackage Hoho
 */
?>

<div class="sidebar clearfix">

	<?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>

		<?php dynamic_sidebar( 'sidebar-main' ); ?>

	<?php else : ?>

		<aside>
			<h3>aside</h3>

			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor. Etiam ullamcorper lorem dapibus velit suscipit ultrices.</p>
		</aside>

	<?php endif; ?>

</div>
