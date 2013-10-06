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

if ( ! function_exists( 'hoho_setup' ) ):

	/**
	 * テーマのデフォルト設定や、WordPress 諸機能のサポートを登録・設定します。
	 *
	 * この関数は init フックの前に実行される after_setup_theme フックへ繋がっていることに注意してください。
	 * init のアクションフックだと間に合わない機能があるからです。
	 */
	function hoho_setup() {

		// ビジュアルエディタ用の css 読み込み
		add_editor_style( 'css/screen.css' );

		// 投稿・コメントページで自動的にRSSフィードのリンクを <head> に挿入
		add_theme_support( 'automatic-feed-links' );

		// カスタム背景有効化
		add_theme_support(
			'custom-background',
			array(
				// デフォルトの色
				'default-color' => 'fff',
				// デフォルトの画像
				//'default-image' => get_template_directory_uri() . '/images/background.jpg',
			)
		);

		// カスタムヘッダー画像有効化
		add_theme_support(
			'custom-header',
			array(
				// デフォルトの画像
				'default-image' => get_template_directory_uri() . '/images/header.jpg',
				// 幅を可変にするか否か
				'flex-width'    => true,
				// カスタムヘッダーの画像幅
				'width'         => 9999, // 今回は幅 100% で使うため仮の数値 9999 にしておく
				// 高さを可変にするか否か
				'flex-height'   => true,
				// カスタムヘッダーの画像高さ
				'height'        => 300,
				// ヘッダーテキストを使うか否か
				'header-text'   => false,
			)
		);

		// アイキャッチを有効化
		add_theme_support( 'post-thumbnails' );

		// メニューを登録
		register_nav_menu( 'primary', 'ヘッダーのメニュー' );

	}

endif;
// 'after_setup_theme' フックが実行された時に 'hoho_setup' 関数を実行する処理
add_action( 'after_setup_theme', 'hoho_setup' );

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
