<?php
/**
 * コメントを表示するためのテンプレート
 *
 * コメント・コメントフォームの両方が含まれる。
 *
 * @package    WordPress
 * @subpackage Hoho
 */
?>

<div id="comments" class="comments">

	<?php
	// パスワード保護機能のサポート
	if ( post_password_required() ) {
		echo '<p class="no-comments">この投稿はパスワードで保護されています。コメントを表示するには、パスワードを入力して下さい。</p>';
		return;
	}
	?>

	<?php if ( have_comments() ) : // コメントがある ?>
		<h4 id="comment-title">
			<?php comments_number(); ?>
		</h4>
		<ul class="comment-list">
			<?php wp_list_comments(); ?>
		</ul>
		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link(); ?></div>
			<div class="alignright"><?php next_comments_link(); ?></div>
		</div>
	<?php else : // コメントがない ?>
		<?php if ( comments_open() ) : // コメントは公開状態だけどコメントがない ?>
			<p>コメントはまだありません。</p>
		<?php else : // コメント閉鎖中 ?>
			<p>コメントは閉鎖されています。</p>
		<?php endif; ?>
	<?php endif; ?>

</div>

<?php comment_form(); // コメントフォームを呼び出す ?>
