<?php
/**
 * functions
 *
 * テーマでは、functions.phpという名前の関数ファイルを使用することができます
 * 基本的にプラグインのように動作し、テーマに存在していれば自動的にWordPressの初期化時に読み込まれます
 *
 * @package    WordPress
 * @subpackage Hoho
 */

/**
 * コンテンツエリアの最大許容幅を設定
 *
 * @since WordPress 2.6
 */
if ( ! isset( $content_width ) )
	$content_width = 585;

/**
 * 自動的にRSSフィードのリンクを挿入
 *
 * @since WordPress 3.0
 */
add_theme_support( 'automatic-feed-links' );

/**
 * メインのサイドバーを定義
 *
 * @since WordPress 2.2 (2.9.0: description プロパティ追加
 */
register_sidebar( $args = array(
		// サイドバーの名前、2つめの引数でテキストドメインを指定
		'name'          => __( 'メインのサイドバー', 'テーマのテキストドメイン' ),
		// サイドバー呼び出し用のID。小文字かつスペースは無きよう。
		'id'            => 'sidebar-main',
		// サイドバーの説明
		'description'   => '',
		// サイドバーウィジェットに付加されるクラス
		'class'         => '',
		// ウィジェットの前に配置する HTML
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		// ウィジェットの後に配置する HTML
		'after_widget'  => '</aside>',
		// ウィジェットタイトルの前に配置する HTML
		'before_title'  => '<h3 class="widgettitle">',
		// ウィジェットタイトルの後に配置する HTML
		'after_title'   => '</h3>' )
);
