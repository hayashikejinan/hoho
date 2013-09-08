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
 * 自動的にRSSフィードのリンクを挿入
 *
 * @since WordPress 3.0
 */
add_theme_support( 'automatic-feed-links' );