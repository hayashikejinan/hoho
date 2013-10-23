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

		<aside class="widget shadow">

			<h3 class="widgettitle">ウィジェットサンプル</h3>

			<p>ウィジェットの表示サンプルです。ウィジェットを何かしら有効にしてください。有効にしましたらこちらサンプルは消えます。</p>

		</aside>

	<?php endif; ?>

</div>
